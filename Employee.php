<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Employee extends Model
{

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'lastname',
        // 'dob',
        'technology',
        'mobile_no',
        'office_location',
        'home_location',
        'office_mail_id',
        'personal_mail_id',
        'skype_id',
        'passport_available',
        'degree',
        'year_of_passing',
        'specialization',
        'certification',
        'total_year_exp',
        'prev_exp',
        'interview_availability',
        'salary_cadre',
        'on_bench_since',
        'designation',
        'team_lead',

    ];  

    

}
