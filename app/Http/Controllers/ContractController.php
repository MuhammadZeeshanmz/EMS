<?php

namespace App\Http\Controllers;

use App\Services\ContractService;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    protected $contractService;

    public function __construct(ContractService $contractService)
    {
        $this->contractService = $contractService;
    }
    public function index(){
        //
    }
    public function store(Request $request){
        $query = $this->contractService->createContract($request);
        return $query;
    }
    public function update(Request $request, $id){
        $query = $this->contractService->update($request, $id);
        return $query;
    }
    public function destroy($id){
        $query = $this->contractService->destroy($id);
        return $query;
    }
    public function show($id){
        $query = $this->contractService->show($id);
        return $query;
    }
}
