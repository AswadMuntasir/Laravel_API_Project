<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MobilesController;
use App\Http\Controllers\TestController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(EmployeesController::class)->group(function () {
    Route::get('employees', 'index');
    Route::post('employee', 'store');
    Route::get('employee/{id}', 'show');
}); 

Route::controller(MobilesController::class)->group(function () {
    Route::get('mobiles', 'index');
    Route::post('mobile', 'store');
    Route::get('mobiles/{id}', 'show');
    Route::post('mobile/filter', 'mobileFilter');
}); 

Route::controller(TestController::class)->group(function () {
    Route::get('all_mobiles', 'index');
}); 