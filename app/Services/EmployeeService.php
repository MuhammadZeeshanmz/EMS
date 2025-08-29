<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeService
{
    // public function storeImage($request)
    // {
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $imageName);
    //         return $imageName;
    //     }
    // }
    public function createEmployee($request)
    {
        try {
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('/uploads', 'public');
            }
            $employee = Employee::create([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'cnic' => $request->cnic,
                'email' => $request->email,
                'cell_no' => $request->cell_no,
                'image' => $path,
                'joining_date' => $request->joining_date,
                'date_of_birth' => $request->date_of_birth,
                'qualification' => $request->qualification,
                'account_no' => $request->account_no,
                'guardian_name' => $request->guardian_name,
                'guardian_no' => $request->guardian_no,
                'designation_id' => $request->designation_id,
                'department_id' => $request->department_id,
                'contract_id' => $request->contract_id,
                'address' => $request->address,
                'status' => $request->status,

            ]);

            return $employee;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function update(Request $request, Employee $employee)
    {
        try {
            $path = $employee->image;

            if ($request->hasFile('image')) {
                if ($employee->image && Storage::disk('public')->exists($employee->image)) {
                    Storage::disk('public')->delete($employee->image);
                }

                $path = $request->file('image')->store('uploads', 'public');
            }

            $employee->update([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'cnic' => $request->cnic,
                'email' => $request->email,
                'cell_no' => $request->cell_no,
                'image' => $path,
                'joining_date' => $request->joining_date,
                'date_of_birth' => $request->date_of_birth,
                'qualification' => $request->qualification,
                'account_no' => $request->account_no,
                'guardian_name' => $request->guardian_name,
                'guardian_no' => $request->guardian_no,
                'designation_id' => $request->designation_id,
                'department_id' => $request->department_id,
                'contract_id' => $request->contract_id,
                'address' => $request->address,
                'status' => $request->status,
            ]);

            return $employee;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
