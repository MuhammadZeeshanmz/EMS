<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $tabel = "employees";
    protected $fillable = [
        'name',
        'father_name',
        'cnic',
        'email',
        'cell_no',
        'image',
        'joining_date',
        'date_of_birth',
        'qualification',
        'account_no',
        'guardian_name',
        'guardian_no',
        'designation_id',
        'department_id',
        'contract_id',
        'address',
        'status',
        
    ];
   public function designation(){
    return $this->belongsTo(Designation::class);
   }

   public function department(){
    return $this->belongsTo(Department::class);
   }

   public function contract(){
    return $this->belongsTo(Contract::class);
   }

}
