<?php

use App\Models\Incident;
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

Route::middleware(['auth:sanctum'])->resource('vehicles', VehicleController::class)->only([
    'index', 'store', "update", "destroy"
]);

Route::resource('incidents', IncidentController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');