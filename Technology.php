<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
	protected $table = 'technologies'; 

    protected $fillable = [
        'tech_name','dept_id'
    ];
}
