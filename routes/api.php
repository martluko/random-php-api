<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;
// use App\Http\Controllers\Api\CompanyController;
// use App\Http\Controllers\Api\ProfessionController;
// use App\Http\Controllers\Api\UserController;
// use App\Http\Controllers\Api\UserHistoryController;
// use App\Http\Controllers\Api\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->User();
// });

// Bookings Routes
Route::apiResource('bookings', BookingController::class);
Route::post('register-visit', [BookingController::class, 'registerVisit']);

// // Company Routes
// Route::apiResource('companies', CompanyController::class);

// // Profession Routes
// Route::apiResource('professions', ProfessionController::class);

// // User Routes
// Route::apiResource('users', UserController::class);

// // User History Routes
// Route::apiResource('user_histories', UserHistoryController::class);

// // Payment Routes
// Route::apiResource('payments', PaymentController::class);

