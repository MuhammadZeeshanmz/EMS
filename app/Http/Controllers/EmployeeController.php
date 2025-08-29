<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
       return $this->employeeService = $employeeService; 
    }
    public function index(){
        $query = Employee::with([ 'designation', 'department', 'contract'])->get();
        return $query;

    }
    public function store(Request $request){

        $query = $this->employeeService->createEmployee($request);
        return $query;
    }

    public function update(Request $request, $employee_code){
        $query = $this->employeeService->update($request, $employee_code);
        return $query;
    }


    public function show($id){
        $employee = Employee::findOrFail($id);
        return $employee;
    }
}
