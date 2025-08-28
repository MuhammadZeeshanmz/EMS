<?php

namespace App\Services;

use App\Models\Designation;

class DesignationService{
    public function createDesignation($request){
        try {
             $designation = Designation::create([
            'name' => $request->name,
        ]);
        return $designation;
        } catch (\Throwable $th) {
            return $th;
        }
      
    }
    public function update($request, $id){
        try {
            $designation = Designation::findOrFail($id);
            $designation->update([
                'name' => $request->name,
            ]);
            return $designation;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id){
        try {
            $designation = Designation::findOrFail($id);
            $designation->delete();
            return response()->json(['message' => 'Designation deleted successfully']);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function show($id){
        try {
            $designation = Designation::findOrFail($id);
            return $designation;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}