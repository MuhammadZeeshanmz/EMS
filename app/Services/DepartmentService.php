<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Employee;

class DepartmentService {

    public function createDepartment($request){
        try {
              $department = Department::create([
            'name' => $request->name,
        ]);
        return $department;
     
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function update($request, $id){
        try {
            $department = Department::findOrFail($id);
            $department->update([
                'name' => $request->name,
            ]);
            return $department;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id){
        try {
            $department = Department::findOrFail($id);
            $department->delete();
            return response()->json(['message' => 'Department deleted successfully']);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function show($id){
        try {
            $department = Department::findOrFail($id);
            return $department;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}