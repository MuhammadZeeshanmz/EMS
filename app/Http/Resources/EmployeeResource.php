<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'father_name' => $this->father_name,
            'cnic' => $this->cnic,
            'email' => $this->email,
            'image' => $this->image ? Storage::url($this->image) : null,
            'designation_id' => $this->designation ? $this->designation->id : null,
            'department_id' => $this->department ? $this->department->id : null,
            'contract_id' => $this->contract ? $this->contract->id : null,
            'cell_no' => $this->cell_no,
            'joining_date' => $this->joining_date,
            'qualification' => $this->qualification,
            'address' => $this->address,
            'status' => $this->status,
            'guardian_name' => $this->guardian_name,
            'guardian_no' => $this->guardian_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
