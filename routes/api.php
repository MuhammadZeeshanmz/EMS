<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ResignationController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/employee', EmployeeController::class);
Route::apiResource('/resign', ResignationController::class);
Route::apiResource('/department', DepartmentController::class);
Route::apiResource('/designation', DesignationController::class);
Route::apiResource('/contract', ContractController::class);
Route::apiResource('/duty', DutyController::class);
