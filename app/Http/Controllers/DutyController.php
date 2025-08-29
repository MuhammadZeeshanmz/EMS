<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use App\Services\DutyService;
use Illuminate\Http\Request;

class DutyController extends Controller
{
    protected $dutyService;

    public function __construct(DutyService $dutyService)
    {
        $this->dutyService = $dutyService;
    }

    public function index(){
        $query = Duty::with([ 'employee.designation', 'employee.contract'])->get();
        return $query;
    }
    public function store(Request $request){
        $duty = $this->dutyService->createDuty($request);
        return response()->json($duty, 201);
    }
    public function update(Request $request, $id){
        $duty = $this->dutyService->update($request, $id);
        return response()->json($duty);
    }
    public function destroy($id){
        $this->dutyService->destroy($id);
        return response()->json(null, 204);
    }
    public function show($id){
        $duty = $this->dutyService->show($id);
        return response()->json($duty);
    }
}
