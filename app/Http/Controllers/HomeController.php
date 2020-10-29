<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Yajra\Datatables\Datatables;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $on_bench = Employee::where('on_bench_since', '!=', '')->get();
        $onBenchCount = $on_bench->count();

        $interview_avail = Employee::where('interview_availability', '=', 'yes')->get();
        $int_avail = $interview_avail->count();

        $data['onBenchCount'] = $onBenchCount;
        $data['int_avail'] = $int_avail;
        return view('home',$data);
    }



     public function getUsers(Request $request) {

        if(Auth::user()->role_id == 3){
            //superadmin //
            // return Auth::user()->role_id; die;
            $data = Employee::all();

        }else if(Auth::user()->role_id == 4){
           $data = Employee::all();

        }else{
            $id = Auth::user()->emp_id;
            

            $data = db::select("SELECT GROUP_CONCAT(lv SEPARATOR ',') FROM ( SELECT @pv:=(SELECT GROUP_CONCAT(id SEPARATOR ',') AS employee_id FROM employees WHERE FIND_IN_SET(team_lead, @pv)) AS lv FROM employees JOIN (SELECT @pv:='".$id."') tmp ) a ");
            // return $data;die;
            
            $data = json_decode( json_encode($data), true);
            foreach($data as $key => $val){
                $employeeList = $val["GROUP_CONCAT(lv SEPARATOR ',')"];

            }
            $employeeIds = explode(',', $employeeList);
            
            $data = DB::table('employees')->whereIn('id', $employeeIds)->get();
            // return $data;die;
            $data = json_decode($data, true);


        }
               
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $id = $row['id'];
       
                           $btn = '<a href="employee_view/'.$id.'" style="margin: 0px 4px 0px 0px" class="btn btn-info" style="color: while !important; " title="View">
                                    <i class="fa fa-eye"></i>';

                           $btn = $btn.'<a href="employee_edit/'.$id.'" style="margin: 0px 4px 0px 0px" class="btn btn-primary" style="color: while !important; " title="Edit">
                                    <i class="fa fa-edit"></i>';

                           // $btn = $btn.'<a href="" style="margin: 0px 4px 0px 0px" class="btn btn-danger" style="color: while !important; " title="Delete">
                           //          <i class="fa fa-trash"></i>';
         
                            return $btn;
                    })
                    
                    ->rawColumns(['action','user'])
                    ->make(true);

    }










         public function getUsers1(Request $request) {

        if(Auth::user()->role_id == 3){
            //superadmin //
            // return Auth::user()->role_id; die;
            $data = Employee::whereNull('user_id')->get();

        }else if(Auth::user()->role_id == 4){
           $data = Employee::all();

        }else{
            $id = Auth::user()->emp_id;
            

            $data = db::select("SELECT GROUP_CONCAT(lv SEPARATOR ',') FROM ( SELECT @pv:=(SELECT GROUP_CONCAT(id SEPARATOR ',') AS employee_id FROM employees WHERE FIND_IN_SET(team_lead, @pv)) AS lv FROM employees JOIN (SELECT @pv:='".$id."') tmp ) a ");
            // return $data;die;
            
            $data = json_decode( json_encode($data), true);
            foreach($data as $key => $val){
                $employeeList = $val["GROUP_CONCAT(lv SEPARATOR ',')"];

            }
            $employeeIds = explode(',', $employeeList);
            
            $data = DB::table('employees')->whereIn('id', $employeeIds)->where('user_id','')->get();
            // return $data;die;
            $data = json_decode($data, true);


        }
               
        return Datatables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //     $id = $row['id'];
                    //       // $btn = '<a href="create_user/'.$id.'" style="margin: 0px 4px 0px 0px" class="btn btn-success btn-sm" style="color: while !important; " title="Make User">Make User
                    //       //           <iclass="fa fa-user"></i>';
                    //       $btn = '<input type="checkbox" name="optradio" value="'.$id.'">';

                    //         return $btn;
                        
                    // })
                    ->addColumn('user', function($row){
                        $id = $row['id'];
                          $btn1 = '<a href="user_create/'.$id.'" style="margin: 0px 4px 0px 0px" class="btn btn-success btn-sm" style="color: while !important; " title="Make User">Make User
                                    <iclass="fa fa-user"></i>';

                            return $btn1;
                        
                    })
                    ->rawColumns(['action','user'])
                    ->make(true);

    }



}
