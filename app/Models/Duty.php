<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    protected $table = 'duties';
    protected $fillable = [
        'employee_code',
        'duty_start',
        'duty_end',
        'shift',
        'location',
      
    ];
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_code' );
    }

}
