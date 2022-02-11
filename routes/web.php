<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/vehicle/search/{vin}", [VehicleController::class, 'getVehicleByVin']);
Route::get("/vehicle", [VehicleController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
