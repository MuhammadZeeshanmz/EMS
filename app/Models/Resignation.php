<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resignation extends Model
{
    protected $table = "resignations";
    protected $fillable = [
        'employee_code',
        'leaving_reason',
        'notice_period',
        'company_property',
        'last_working_day',
       
    ];
}
