<?php

namespace App\Imports;

use App\Employee;
use App\Department;
use App\Technology;
use App\Location;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon;


class EmployeeImport implements ToModel , WithHeadingRow , SkipsOnError ,WithValidation ,SkipsOnFailure ,WithStartRow
{
    use Importable,SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // print_r($row);die;

        $department = Department::pluck('id','dept_name');
        $technology = Technology::pluck('id','tech_name');
        $location = Location::pluck('id','name');
        $teamLead = Employee::pluck('id','neo_employee_id');
        $team_lead = @$teamLead[$row['team_lead']];

        // print_r($team_lead);echo"<hr>";
        // print_r($teamLead);die;

        // print_r($location['Mumbai']); echo"<hr>";die;

        if(!empty($row['office_location']))
        $office_location_name = ucfirst($row['office_location']);
        $office_location_id = @$location[$office_location_name];

        if(!empty($row['home_location']))
        $home_location_name = ucfirst($row['home_location']);
        $home_location_id = @$location[$home_location_name];

        if(!empty($row['technology']))
        $technology_name = ucfirst($row['technology']);
        $tech_id = @$technology[$technology_name];


        if(!empty($row['department']))
        $department_name = ucfirst($row['department']);
        $dept_id = @$department[$department_name];

        if(!empty($row['work_history'])){
            $workData = explode(',', $row['work_history']);
            $workDetails = array_chunk($workData, 6);

            $keys = array('client_name','project_name','start_date','end_date','duration','technology');
            foreach($workDetails as $key => $value){
                $work_hist[] = @array_combine($keys, $value);
               
            }
            $work_hist =  json_encode($work_hist,true);
        }else{
            $work_hist = NULL;
        }

        if(!empty($row['work_history']) ){
            $interviewRow = explode(',', $row['interview_history']);
            $intDetails = array_chunk($interviewRow, 4);

            // echo"<pre>"; print_r($intDetails);echo"</pre>";die;

            $keys = array('client_name','first_round','second_round','status');
            foreach($intDetails as $key => $value){
                $int_hist[] = @array_combine($keys, $value);
            }
            $int_hist =  json_encode($int_hist,true);
        }else{
            $int_hist = NULL;
        }
        
        
        

        
        $employee = new Employee;
        $employee->name = $row['name'];
        $employee->lastname = $row['lastname']??NULL;
        $employee->dob = Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob']));
        $employee->technology = $row['technology'] ? $tech_id : NULL;
        $employee->department = $row['department'] ? $dept_id : NULL;
        $employee->mobile_no = $row['mobile_number']??NULL;
        $employee->office_location = $row['office_location'] ? $office_location_id : NULL;
        $employee->home_location    = $row['home_location'] ? $home_location_id :NULL;
        $employee->office_mail_id   = $row['office_mail_id']??NULL;
        $employee->personal_mail_id  = $row['personal_mail_id']??NULL;
        $employee->skype_id          = $row['skype_id']??NULL;
        $employee->passport_available= $row['passport_available']??NULL;
        $employee->degree            = $row['degree']??NULL;
        $employee->passing_year      = $row['year_of_passing']??NULL;
        $employee->specialization    = $row['specialization']??NULL;
        $employee->certification     = $row['certification']??NULL;
        $employee->total_exp         = $row['total_year_of_exp']??NULL;
        $employee->prev_exp          = $row['privious_experience']??NULL;
        $employee->interview_availability = $row['interview_availability']??NULL;
        $employee->salary_cadre      = $row['privious_experience']??NULL;
        $employee->on_bench_since    = Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['on_bench']));
        $employee->designation       = $row['designation']??NULL;
        $employee->team_lead         = $row['team_lead'] ? $team_lead : NULL;   
        $employee->joining_date      = Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_joining']));

        $employee->work_history       = $work_hist??NULL;
        $employee->interview_history  = $int_hist??NULL;
        $employee->salary_cadre       = $row['salary_cadre']??NULL;
        $employee->save();

        return $employee;

    }


    public function rules(): array
    {
        return [
           // email is heading of xlsx file if heading is not present use cellno like 1 ,2 //
             '*.office_mail_id' => ['email','unique:employees,office_mail_id'],
             '*.dob' => ['required'],
             // '*.dob' => ['required', 'date', 'date_format:YYYY-MM-DD'],
             '*.name' => ['required'],
             '*.mobile_number' => ['required'],
             '*.technology' => ['required'],
             '*.office_location' => ['required'],
             '*.home_location' => ['required'],
             '*.personal_mail_id' => ['required'],
             '*.year_of_passing' => ['required'],
             '*.date_of_joining' => ['required'],
             '*.team_lead' => ['required'],

        ];
    }


    public function startRow(): int
    {
        return 2;
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'Employee name field is required.',
            'office_mail_id.required' => 'Office mail id is required.',
            'office_mail_id.unique' => 'Office mail id already exist.',
            'mobile_number.required' => 'Mobile number field is required.',
            'technology.required' => 'Technology field is required.',
            'office_location.required' => 'Office location field is required.',
            'home_location.required' => 'Home location field is required.',
            'personal_mail_id.required' => 'Personal Mail id field is required.',
            'year_of_passing.required' => 'Year Of Passing field is required.',
            'date_of_joining.required' => 'Date of joining field is required.',
            'team_lead.required' => 'Team Lead is required.',
        ];
    }


    

}
