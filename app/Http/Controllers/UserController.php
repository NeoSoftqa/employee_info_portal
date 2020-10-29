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
use App\Role;
use Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Helper::shout('now i\'m using my helper class in a controller!!');
    }

    public function create()
    {
    	$roles = Role::pluck('role_name','id');

    	$data['role'] = $roles;
    	return view("user_create",$data);
    }

    public function storeUser(Request $request){
    		// return "hiii";die;
    	$validator = Validator::make($request->all(), [
				    'firstname' => 'required',
				    'email' => 'required|max:255|unique:users',
				    'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
					'password_confirmation' => 'min:6',
					'user_type' => 'required'
						],[
				    'firstname.required'  => 'First name field is required.',
				    'email.required' => 'Email field is required',
				    'email.unique' => 'Email already exist',
				    'password.required'  => 'Password field is required.',
				    'password_confirmation.same'  => 'Password does not match.',
				    'user_type.required'  => 'Please Select User type.'
						]
					);

    				if ($validator->fails()) { 
					     return back()->withErrors($validator)->withInput();
					} else { 

						// return $request; die;

						User::create([
				            'name' => $request->firstname,
				            'email' => $request->email,
				            'password' => Hash::make($request->password),
				            'role' => $request->user_type
				        ]);

				        return back()
					        ->with('message', 'User Created Successfully!');  
					}

    }

    public function userList(){
    	$on_bench = Employee::where('on_bench_since', '!=', '')->get();
        $onBenchCount = $on_bench->count();

        $interview_avail = Employee::where('interview_availability', '=', 'yes')->get();
        $int_avail = $interview_avail->count();

        $data['onBenchCount'] = $onBenchCount;
        $data['int_avail'] = $int_avail;
        return view('user_list',$data);
    }

    public function createUserById($id)
    {
    	$employeeData = Employee::where('id',$id)->get();
    	// return $employeeData;die;
    	$roles = Role::pluck('role_name','id');

    	$data['role'] = $roles;
    	$data['id'] = $id;
    	$data['employeeData'] = $employeeData;
    	return view("user_create_ByID",$data);
    }

        public function storeUserById(Request $request,$id){
        	// return $request;die;
        	
    	$validator = Validator::make($request->all(), [
				    'firstname' => 'required',
				    'email' => 'required|max:255|unique:users',
				    'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
					'password_confirmation' => 'min:6',
					'user_type' => 'required'
						],[
				    'firstname.required'  => 'First name field is required.',
				    'email.required' => 'Email field is required',
				    'email.unique' => 'Email already exist',
				    'password.required'  => 'Password field is required.',
				    'password_confirmation.same'  => 'Password does not match.',
				    'user_type.required'  => 'Please Select User type.'
						]
					);

    				if ($validator->fails()) { 
					     return back()->withErrors($validator)->withInput();
					} else { 

						// return $request; die;
						$user = new user();
						$user->name = $request->firstname;
						$user->email = $request->email;
						$user->password = Hash::make($request->password);
						$user->role_id = $request->user_type;
						$user->emp_id = $id;
						$user->save();

						// return $user->id;die;
				       
						$updayeEmp = Employee::where('id', $id)->update(['user_id' => $user->id]);



				        return back()
					        ->with('message', 'User Created Successfully!');  
					}

    }


}
