<?php

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\PalakasanController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\PointsController;

Route::resource('product', ProductController::class);
Route::resource('college', CollegeController::class);
Route::resource('venue', VenueController::class);
Route::resource('sport', SportController::class);



Route::get('/', function () {
    return Inertia::render('SSCAdmin/Dashboard');
});




