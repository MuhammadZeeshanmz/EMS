<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ResignationController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/employees', EmployeeController::class);
Route::apiResource('/resigns', ResignationController::class);
Route::apiResource('/departments', DepartmentController::class);
Route::apiResource('/designations', DesignationController::class);
Route::apiResource('/contracts', ContractController::class);
Route::apiResource('/dutys', DutyController::class);
