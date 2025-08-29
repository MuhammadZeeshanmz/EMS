<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\Duty;
use Carbon\CarbonPeriod;

class DutyService
{
    public function createDuty($request)
    {
        $createdDuties = [];

        try {
            // Get current year and month automatically
            $year = date('Y');
            $months = [date('m')];  // for example, just the current month; or define an array of months as needed

            foreach ($months as $month) {
                $dates = $this->workingDaysInMonth($year, $month);

                foreach ($dates as $date) {
                    $dutyStart = Carbon::parse($date . ' ' . $request->duty_start);
                    $dutyEnd = Carbon::parse($date . ' ' . $request->duty_end);

                    $createdDuties[] = Duty::create([
                        'employee_code' => $request->employee_code,
                        'duty_start' => $dutyStart->format('Y-m-d H:i:s'),
                        'duty_end' => $dutyEnd->format('Y-m-d H:i:s'),
                        'shift' => $request->shift,
                        'location' => $request->location,
                    ]);
                }
            }

            return response()->json([
                'message' => 'Monthly duties created successfully.',
                'count' => count($createdDuties),
                'duties' => $createdDuties
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ], 500);
        }
    }


private function workingDaysInMonth($year, $month)
{
    try {
        $startDate = Carbon::create($year, $month, 1);
        $endDate = $startDate->copy()->endOfMonth();

        $period = CarbonPeriod::create($startDate, $endDate);

        $workingDays = [];

        foreach ($period as $date) {
            if (!$date->isWeekend()) {
                $workingDays[] = $date->toDateString();
            }
        }

        return $workingDays;
    } catch (\Throwable $th) {
        return [];
    }
}


    public function update($request, $id)
    {
        $dutyUpdate = Duty::findOrFail($id);
        $dutyUpdate->update([
            'employee_code' => $request->employee_code,
            'duty_start' => $request->duty_start,
            'duty_end' => $request->duty_end,
            'shift' => $request->shift,
            'location' => $request->location,
        ]);
        return $dutyUpdate;
    }
    public function destroy($id)
    {
        $duty = Duty::findOrFail($id);
        $duty->delete();
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $duty = Duty::findOrFail($id);
        return response()->json($duty);
    }
}
