<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ScheduledDrive;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\Validator;

class SchedulerController extends Controller
{
    //

    public function index($userId, $start, $end, $carId = null, $categoryId = null)
    {
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        $message = '';
        $success = true;
        $data = [];
        try {


            $user = User::findOrFail($userId);


            $allowedCategories = $user->position->allowedCategories;
            $allowedCategoriesIds = $allowedCategories->pluck('id')->toArray();

            $allowedCars = Car::whereIn('car_category_id', $allowedCategoriesIds)->get(['id', 'model']);
            $allowedCarsIds = $allowedCars->pluck('id')->toArray();

            if ($carId && !in_array($carId, $allowedCarsIds)) {
                throw new Exception('You are not allowed to use this car');
            }

            if ($categoryId && !in_array($categoryId, $allowedCategoriesIds)) {
                throw new Exception('You are not allowed to use this car category');
            }

            $allowedCarsSchedule = ScheduledDrive::whereIn('car_id', $allowedCarsIds)->orderBy('end_datetime')->get();

            for ($i = 0; $i < $allowedCarsSchedule->count(); $i++) {
                if ($start >= $allowedCarsSchedule[$i]->end_datetime && ($i + 1 == $allowedCarsSchedule->count() || $end <= $allowedCarsSchedule[$i + 1]->start_datetime)) {
                    $data[] = $allowedCarsSchedule[$i]->car;
                }
            }

            // if ($sd) {
            //     throw new Exception(
            //         'There are already scheduled drives between ' . $start . ' and ' . $end
            //     );
            // }

        } catch (Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'position' => $user->position,
            'allowedCars' => $allowedCars,
            'data' => $data
        ], 200);
    }
}
