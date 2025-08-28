<?php

namespace App\Http\Controllers;

use App\Services\DesignationService;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    protected $designationService;
    public function __construct(DesignationService $designationService)
    {
        $this->designationService = $designationService;
    }
    public function index(){
        //
    }
    public function store(Request $request){
        $query = $this->designationService->createDesignation($request);
        return $query;
    }
    public function update(Request $request, $id){
        $query = $this->designationService->update($request, $id);
        return $query;
    }
    public function destroy($id){
        $query = $this->designationService->destroy($id);
        return $query;
    }
    public function show($id){
        $query = $this->designationService->show($id);
        return $query;
    }
}
