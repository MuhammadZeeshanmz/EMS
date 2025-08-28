<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ResignationController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/employee', EmployeeController::class);
Route::apiResource('/resign', ResignationController::class);