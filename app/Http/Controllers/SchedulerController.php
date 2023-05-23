<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Services\CarService;
use App\DTOs\JsonResponseDTO;
use App\Models\ScheduledDrive;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class SchedulerController extends Controller
{
    //

    /**
     * Retrieves a collection of available cars for a given user and date range.
     *
     * @param int $userId The ID of the user to retrieve cars for.
     * @param string $start Start date and time in ISO 8601 format.
     * @param string $end End date and time in ISO 8601 format.
     * @param int|null $carId (optional) The ID of the car to filter results by.
     * @param int|null $categoryId (optional) The ID of the category to filter results by.
     * @throws Exception When the user is not allowed to use the specified car or category.
     * @return Illuminate\Http\JsonResponse A JSON response containing a list of available cars.
     */
    public function index($userId, $start, $end, $carId = null, $categoryId = null)
    {
        $data = new Collection();
        $success = true;
        $message = '';

        try {

            $validator = Validator::make(['start' => $start, 'end' => $end], [
                'start' => 'required|date_format:Y-m-d H:i',
                'end' => 'required|date_format:Y-m-d H:i'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $start = Carbon::parse($start);
            $end = Carbon::parse($end);                   

            $user = User::findOrFail($userId);

            $allowedCars = CarService::getAllowedUserCars($user);
            $allowedCarIds = $allowedCars->cars->pluck('id')->toArray();

            // Тут можно было использовать Validator, но я подумал ни кчему он тут.             
            if ($carId && !in_array($carId, $allowedCarIds)) {
                throw new Exception('You are not allowed to use this car');
            }

            if ($categoryId && !in_array($categoryId, $allowedCars->categories->pluck('id')->toArray())) {
                throw new Exception('You are not allowed to use this car category');
            }

            $allowedCarIds = $carId ? [$carId] : $allowedCarIds;

            $allowedCarsSchedule = ScheduledDrive::with('car')
                ->whereIn('car_id', $allowedCarIds)
                ->whereDate('end_datetime', '=', $start->toDateString())
                ->where('end_datetime', '<=', $start)
                ->when($categoryId, fn ($query) => $query->whereHas('car', fn ($query) => $query->where('car_category_id', $categoryId)))
                ->orderBy('end_datetime')
                ->get();

            $data = $allowedCarsSchedule->count() == 0 ? $allowedCars->cars : [];

            for ($i = 0; $i < $allowedCarsSchedule->count(); $i++) {
                if ($start >= $allowedCarsSchedule[$i]->end_datetime && ($i + 1 == $allowedCarsSchedule->count() || $end <= $allowedCarsSchedule[$i + 1]->start_datetime)) {
                    $data[] = $allowedCarsSchedule[$i]->car;
                }
            }
        } catch (Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }

        return response()->json(
            new JsonResponseDTO([
                'success' => $success,
                'message' => $message,                
                'data' => $data
            ]),
            200
        );
    }
}
