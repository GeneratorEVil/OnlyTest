<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Get a list of free cars for a given user and time range.
 *
 * URL: /cars/{userId}/{start}/{end}/?{carId}/?{categoryId}
 * Method: GET
 *
 * @param  int  $userId  The ID of the user for whom to retrieve the scheduled drives.
 * @param  string  $start  The start date for the time range of scheduled drives to retrieve.
 * @param  string  $end  The end date for the time range of scheduled drives to retrieve.
 * @param  int|null  $carId  An optional ID of a specific car to filter the results by.
 * @param  int|null  $categoryId  An optional ID of a specific car category to filter the results by.
 *
 * @throws \Exception If the start or end date is invalid.
 *
 * @return \Illuminate\Http\Response A JSON response containing a list of scheduled drives.
 */

Route::get('/cars/{userId}/{start}/{end}/{carId?}/{categoryId?}', [App\Http\Controllers\SchedulerController::class, 'index']);
