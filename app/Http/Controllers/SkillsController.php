<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SkillsController extends Controller
{
	public function skillsview()
    {
       return view('skillmatrix');
    }

}
