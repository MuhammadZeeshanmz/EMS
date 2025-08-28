<?php

namespace App\Http\Controllers;

use App\Models\Resignation;
use App\Services\ResignationService;
use Illuminate\Http\Request;

class ResignationController extends Controller
{
    protected $resignationService;
    public function __construct(ResignationService $resignationService)
    {
        return $this->resignationService = $resignationService;
    }
    public function index(){

    }

    public function store(Request $request){
        $query = $this->resignationService->createResignation($request);
        return $query;
    }

}
