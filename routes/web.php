<?php

use App\Http\Controllers\IncidentController;
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

Route::get('/', function() {
    return redirect()->route('incidents.index');
});


Route::resource('vehicles', VehicleController::class)->only([
    'index', 'store', "update", "destroy"
]);

Route::resource('incidents', IncidentController::class)->only([
    'index', 'store', "update", "destroy"
]);