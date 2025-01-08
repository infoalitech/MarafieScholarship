<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScholarshipApplicantController;
use App\Http\Controllers\AuthController;
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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/applicant',[ScholarshipApplicantController::class, 'index']);
    Route::post('/applicant/store',[ScholarshipApplicantController::class, 'store']);
    Route::put('/applicant/update/{id}',[ScholarshipApplicantController::class, 'update']);
    Route::delete('/applicant/delete/{id}',[ScholarshipApplicantController::class, 'destroy']);


    Route::get('/qualification',[ScholarshipApplicantController::class, 'index']);
    Route::get('/qualification',[ScholarshipApplicantController::class, 'show']);
    Route::get('/qualification',[ScholarshipApplicantController::class, 'create']);
    Route::get('/qualification',[ScholarshipApplicantController::class, 'update']);
    Route::get('/qualification',[ScholarshipApplicantController::class, 'store']);


    Route::get('/district',[ScholarshipApplicantController::class, 'index']);

    Route::get('/tehsil',[ScholarshipApplicantController::class, 'index']);
    Route::get('/tehsil/{distric_id}',[ScholarshipApplicantController::class, 'show']);

    Route::get('/degrees',[ScholarshipApplicantController::class, 'show']);

    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

