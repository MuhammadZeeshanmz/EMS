<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    public function index(){
        //
    }
    public function store(Request $request){
        $query = $this->departmentService->createDepartment($request);
        return $query;
    }
    public function update(Request $request, $id){
        $query = $this->departmentService->update($request, $id);
        return $query;
    }
    public function destroy($id){
        $query = $this->departmentService->destroy($id);
        return $query;
    }
    public function show($id){
        $query = $this->departmentService->show($id);
        return $query;
    }

}
