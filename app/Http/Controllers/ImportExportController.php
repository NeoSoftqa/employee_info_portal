<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;

use App\Imports\BulkImport;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

use Response;
use Validator;

class ImportExportController extends Controller
{
	public function importExportView()
    {
       return view('importexport');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        $file = $request->file('file')->store('imports');

        $import = new UsersImport();
        $import->import(request()->file('file'));

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }else{
            return back()->with('success','You have successfully upload file.');
        }
        
    }


    public function importExport()
    {
       return view('employeeimportexport');
    }
    
    public function EmployeeExport() 
    {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }

    public function importEmployeeData(Request $request) 
    {
        $file = $request->file('file')->store('imports');

        $validator = Validator::make(
          [
              'file'      => $request->file,
              'extension' => strtolower($request->file->getClientOriginalExtension()),
          ],
          [
              'file'          => 'required',
              'extension'      => 'required|in:xlsx',
          ]
        );

        if ($validator->fails()) { 
            return redirect('employee_export_import')->with('file_error', 'XLSX File Allowed Only');
        }else{
            $import = new EmployeeImport();
            $import->import(request()->file('file'));

            // dd($import->failures());
            if($import->failures()->isNotEmpty()){
                return back()->withFailures($import->failures());
            }else{
                return back()->with('success','Data Imported successfully.');
            }
        }

        
        
    }

    public function sampleFile(){
      
        $filename = "employee.xlsx";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Name', 'lastname', 'department',  'Technology',  'DOB', 'Mobile Number',   'Home Location',   'Office Location', 'office Mail Id',  'Personal Mail Id',    'Skype Id',    'Passport Available',  'Degree',  'Year Of Passing', 'Specialization',  'Certification',   'Total Year Of Exp',   'Privious Experience', 'Neo Experience',  'Team Lead',   'Designation', 'Interview Availability',  'On Bench',    'Salary Cadre',    'Date Of Joining', 'work History',    'interview history'));





        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'employee.xlsx', $headers);
    }

   
}
