<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Resignation;

class ResignationService
{
    public function createResignation($request)
    {
        try {
            $resign = Resignation::create([
                'employee_code' => $request->employee_code,
                'leaving_reason' => $request->leaving_reason,
                'notice_period' => $request->company_property,
                'company_property' => $request->company_property,
                'last_working_day' => $request->last_working_day,



            ]);
            Employee::where('id', $request->employee_code)
                ->update([
                    'status' => 0
                ]);

            return $resign;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
