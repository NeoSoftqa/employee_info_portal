<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Employee::all();
        return Employee::all();
    }

    public function headings(): array
    {
        return [
             'Name',
            ' Last Name',
            ' Technology',
             'DOB(YYYY-MM-DD)' ,
             'Mobile Number' ,
             'Home Location',
             'Office Location' ,
             'Office Mail Id' ,
             'Personal Mail Id',
             'Skype Id' , 
             'Passport Available', 
             'Degree' ,
             'Year Of Passing', 
             'Specialization' , 
             'Certification' ,
             'Total Year Of Exp' , 
             'Privious Experience' , 
             'Team Lead' , 
             'Designation' , 
             'Interview Availability',
             'On Bench',
             'Salary Cadre', 
             'Date Of Joining' ,
             'On Bench Since'
        ];
    }

}
