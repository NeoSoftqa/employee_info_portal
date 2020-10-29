<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;

use App\Employee;
use App\Location;
use App\Technology;
use App\Department;
use Helper;


class HelperController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        Helper::shout('now i\'m using my helper class in a controller!!');
    }

    public function getTechnologyByID($id){
    	$tech = Technology::where('dept_id',$id)->pluck('tech_name','id');
    	return $tech;
    }
}