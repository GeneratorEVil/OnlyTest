<?php

namespace App\Services;

use App\DTOs\UserCarsDTO;
use App\Models\Car;
use App\Models\User;

class CarService
{
    /**
     * Retrieves the allowed cars for a given user.
     *
     * @param User $user the user for which to retrieve the allowed cars
     * @throws Some_Exception_Class if unable to retrieve the allowed cars
     * @return UserCars the allowed cars and corresponding categories
     */
    public static function getAllowedUserCars(User $user): UserCarsDTO
    {
        $allowedCategoryIds = $user->position->allowedCategories->pluck('id')->toArray();
        $allowedCars = Car::whereIn('car_category_id', $allowedCategoryIds)->get(['id', 'model']);
        $result = new UserCarsDTO();
        $result->cars = $allowedCars;
        $result->categories = $user->position->allowedCategories;

        return $result;
    }
}
