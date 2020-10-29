<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;

use App\Employee;
use App\Location;
use App\Technology;
use App\Department;
use App\User;
use Helper;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Helper::shout('now i\'m using my helper class in a controller!!');
    }

    public function showEmployee(Request $request, $id)
    {
    	// return $request; die;
    	$employee = Employee::find($id);
    	$locationData = Location::pluck('name','id');
    	$techData = Technology::where('dept_id',$employee['department'])->pluck('tech_name','id');
    	$deptData = Department::pluck('dept_name','id');
    	$teamLead = Employee::pluck('name','id');

    	if ($request->isMethod('post')) {
    		// return "hiiiiii";die;

		    if($request->form == "personalDetails"){
		    	// return $request;die;
		    	$validator = Validator::make($request->all(), [
				    'firstname' => 'required',
				    'lastname' => 'required',
				    'mobile_no' => 'required',
				    'home_location' => 'required',
				    'offce_mail_id' => 'required',
				    'personal_mail_id' => 'required',
				    // 'skype_id' => 'required',
				    'passport' => 'required',
				    'dob' => 'required',
						],[
				    'firstname.required'  => 'First name field is required.',
				    'lastname.required'    => 'Last name field is required',
				    'mobile_no' => 'Mobile number field is required',
				    'home_location' => 'Home location field is required',
				    'offce_mail_id' => 'Office mail id field is required',
				    'personal_mail_id' => 'Personal mail id field is required',
				    // 'skype_id' => 'field is required',
				    'passport' => 'Passport field is required',
				    'dob' => 'Date of birth field is required',
						]
					);

		    	
					if ($validator->fails()) { 
						// return "hiiiiii validations";die;
					     return back()->withErrors($validator)->withInput();
					} else {
						// return "hiiiiii";die;
						$employee = Employee::find($id);
						$employee->name = $request->firstname;
				    	$employee->lastname = $request->lastname;
				    	$employee->dob = $request->dob;
				    	$employee->mobile_no = $request->mobile_no;
				    	$employee->office_mail_id = $request->offce_mail_id;
				    	$employee->skype_id = $request->skype_id;
				    	$employee->personal_mail_id = $request->personal_mail_id;
				    	$employee->passport_available = $request->passport;
				    	$employee->office_location = $request->office_location;
				    	$employee->home_location = $request->home_location;
				    	$employee->save(); 

					    // return back()
					    //     ->with('message', 'Data updated Successfully!');  
					    return redirect('employee_edit/'.$id.'?accordion=1')->with('message', 'Personal Details updated Successfully!'); 
					}   

		    }

		    if($request->formname == "educationalDetails"){

		    	$validator = Validator::make($request->all(), [
				    'degree' => 'required',
				    'passing_year' => 'required',
				    'department' => 'required',
				    'technology' => 'required',
				    'specialization' => 'required',
						],[
				    'degree.required'  => 'Degree field is required.',
				    'passing_year.required'  => 'Passing year field is required.',
				    'department.required'    => 'Department field is required',
				    'technology.required' => 'Technology field is required',
				    'specialization.required' => 'Specialization field is required',
				   		]
					);

		    	if ($validator->fails()) { 
					     return redirect('employee_edit/'.$id.'?accordion=2')->withErrors($validator)->withInput();
					} else {
						// return "hiiiiii";die;
						$employee = Employee::find($id);
						$employee->passing_year = $request->passing_year;
				    	$employee->department = $request->department;
				    	$employee->technology = $request->technology;
				    	$employee->degree = $request->degree;
				    	$employee->specialization = $request->specialization;
				    	$employee->save(); 

					    // return back()
					    //     ->with('message', 'Data updated Successfully!');  
					    return redirect('employee_edit/'.$id.'?accordion=2')->with('educational_msg', 'Educationl Details updated Successfully!'); 
					}   


		    }



		    if($request->formname == "employementDetails"){
		    	// return $request;die;
		    	$validator = Validator::make($request->all(), [
				    'interview_availability' => 'required',
				    'salary_cadre' => 'required',
				    'joining_date' => 'required',
				    'designation' => 'required',
				    'team_lead' => 'required',
				    // 'on_bench' => 'required',
						],[
				    'interview_availability.required'  => 'Interview availability field is required.',
				    'salary_cadre.required'    => 'Salary cadre field is required',
				    'joining_date.required' => 'Joining date field is required',
				    'designation.required' => 'Designation field is required',
				    'team_lead.required' => 'Team Lead field is required',
				    // 'on_bench.required' => 'On bench field is required',
				   		]
					);

		    	if ($validator->fails()) { 
					     // return back()->withErrors($validator)->withInput();
					     return redirect('employee_edit/'.$id.'?accordion=3')->withErrors($validator)->withInput();
					} else {
						$employee = Employee::find($id);
						$employee->interview_availability = $request->interview_availability;
				    	$employee->salary_cadre = $request->salary_cadre;
				    	$employee->joining_date = $request->joining_date;
				    	$employee->designation = $request->designation;
				    	$employee->on_bench_since = $request->on_bench;
				    	$employee->team_lead = $request->team_lead;
				    	$employee->save(); 

					    // return back()
					    //     ->with('message', 'Data updated Successfully!');  
					    return redirect('employee_edit/'.$id.'?accordion=3')->with('employement_msg', 'Employement Details updated Successfully!'); 
					}   

		    }



		    if($request->formname == "workHistory"){
		    	
		    	$validator = Validator::make($request->all(), [
				    '*.client_name' => 'required',
				    '*.project_name' => 'required',
				    '*.start_date' => 'required',
				    '*.end_date' => 'required',
				    '*.duration' => 'required',
				    '*.technology' => 'required',
						],[
				    'client_name.required'  => 'Client name field is required.',
				    'project_name.required'    => 'Project name field is required',
				    'start_date.required' => 'Start date field is required',
				    'end_date.required' => 'End date field is required',
				    'duration.required' => 'Duration field is required',
				    'technology.required' => 'Technology field is required',
				   		]
					);

		    	if ($validator->fails()) { 
					     return redirect('employee_edit/'.$id.'?accordion=4')->withErrors($validator)->withInput();
					} else {
						$project = count($request->client_name);
					
						for($i=0; $i<$project;$i++){
							$messages[] = array(
							        'client_name' => $request->client_name[$i],
							        'project_name' => $request->project_name[$i],
							        'start_date' => $request->start_date[$i],
							        'end_date' => $request->end_date[$i],
							        'duration' => $request->duration[$i],
							        'technology' => $request->technology[$i],
							    );
						}
						
						
						$work_details =  json_encode($messages,true);

						$employee = Employee::find($id);
				    	$employee->work_history = $work_details;
				    	$employee->save(); 

					    // return back()
					    //     ->with('message', 'Data updated Successfully!');  
					    return redirect('employee_edit/'.$id.'?accordion=4')->with('work_msg', 'Work Experience Details updated Successfully!'); 
					}   


		    }


		    
		    if($request->formname == "interviewDetails"){
		  //   	return $request;die;

		  //   	foreach($request->client_name as $key => $val)
				// {

				//     $rules['client_name.'.$key] = 'required|distinct|min:3';
				//     $messages['client_name.'.$key] = 'The '.$val.'" must be less than :max characters.';
				// }

				// $rules['amount'] = 'required|integer|min:1';
				// $rules['description'] = 'required|string';

				// $validator = Validator::make($messages, $rules);

				// //Now check validation:
				// if ($validator->fails()) 
				// { 
				//   return redirect('employee_edit/'.$id.'?accordion=5')->withErrors($validator)->withInput();
				// }

				// die;


		    	$validator = Validator::make($request->all(), [
				    'client_name' => 'required',
				    'first_round' => 'required',
				    'second_round' => 'required',
				    'status' => 'required',
						],[
				    'client_name.required'  => 'Client name field is required.',
				    'first_round.required'    => 'First Round Date field is required',
				    'second_round.required' => 'Secound Round date field is required',
				    'status.required' => 'Status field is required',
				    
				   		]
					);

		    	if ($validator->fails()) { 
		    		// return "fail".$request;die;
					     return redirect('employee_edit/'.$id.'?accordion=5')->withErrors($validator)->withInput();
					} else {
						// return $request;die;
						$project = count($request->client_name);
					
						for($i=0; $i<$project;$i++){
							$messages[] = array(
							        'client_name' => $request->client_name[$i],
							        'first_round' => $request->first_round[$i],
							        'second_round' => $request->second_round[$i],
							        'status' => $request->status[$i]
							    );
						}
						
						
						$interview_history =  json_encode($messages,true);

						$employee = Employee::find($id);
				    	$employee->interview_history = $interview_history;
				    	$employee->save(); 

					    // return back()
					    //     ->with('message', 'Data updated Successfully!');  
					    return redirect('employee_edit/'.$id.'?accordion=5')->with('interview_msg', 'Interview Details updated Successfully!'); 
					}   


		    }




		    
		}
    	// return $id;die;
    	$data['locationData'] = $locationData;
    	$data['techData'] = $techData;
    	$data['deptData'] = $deptData;
    	$data['teamLead'] = $teamLead;
    	$data['id'] = $id;
    	$data['employee_details'] = Employee::find($id);
    	return view("employee_edit",$data);
    }
    public function editEmployee(){

    }
    
    public function showEmployeeDetails($id){

    	$employee = Employee::find($id);
    	// return  $employee;die;
    	$locationData = Location::pluck('name','id');
    	if($employee['department']!==null){
    		$techData = Technology::where('dept_id',$employee['department'])->pluck('tech_name','id');
    		$data['techData'] = $techData;
    	}
    	
    	$deptData = Department::pluck('dept_name','id');
    	$teamLead = Employee::pluck('name','id');
    	$work_hist = Employee::pluck('work_history');
    	$interview_history = Employee::pluck('interview_history');
    	
    	$data['locationData'] = $locationData;
    	
    	$data['deptData'] = $deptData;
    	$data['teamLead'] = $teamLead;
    	$data['teamLead'] = $teamLead;
    	$data['work_hist'] = $work_hist;
    	$data['interview_history'] = $interview_history;
    	$data['employee_details'] = Employee::find($id);
    	return view("employe_view",$data);
    }
}
