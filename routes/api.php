<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientsController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    # Method Api Resource
    Route::apiResource('patients', PatientsController::class);
});

# Method (GET) Search Resource by name
Route::get('/patients/search/{name}', [PatientsController::class, 'search']);

# Method (GET) Positive Resource
Route::get('/patients/status/positive', [PatientsController::class, 'positive']);

# Method (GET) Recovered Resource
Route::get('/patients/status/recovered', [PatientsController::class, 'recovered']);

# Method (GET) Dead Resource
Route::get('/patients/status/dead', [PatientsController::class, 'dead']);

# Endpoint Register dan Login
Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
