<?php

namespace App\Services;

use App\Models\Contract;

class ContractService {
    public function createContract($request){
        try {
              $contract = Contract::create([
            'name' => $request->name,
        ]);
        return $contract;
     
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function update($request, $id){
        try {
            $contract = Contract::findOrFail($id);
            $contract->update([
                'name' => $request->name,
            ]);
            return $contract;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id){
        try {
            $contract = Contract::findOrFail($id);
            $contract->delete();
            return response()->json(['message' => 'Contract deleted successfully']);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function show($id){
        try {
            $contract = Contract::findOrFail($id);
            return $contract;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}