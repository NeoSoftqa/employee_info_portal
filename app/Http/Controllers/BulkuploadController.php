<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use Response;
use App\Document;
use Illuminate\Support\Facades\Auth;
use session;
use Excel;

class BulkuploadController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	$docs = Document::get();
    	$data['docs'] = $docs;
    	return view("employee_bulkupload",$data);
    }
    public function storeData(Request $request){
    
	    $document = new Document;

    	if($files=$request->file('file')){
		$request->validate([
            'file' => 'required|mimes:pdf,xlsx,csv|max:2048',

        ]);
        // $fileName = time().'.'.$request->file->extension();  
        $fileName = time().'.'.$request->file('file')->getClientOriginalName();

          
          $document->doc_name = $fileName;
	      $document->created_by = Auth::id();
	      $document->save();

        // return $fileName;die;
        $request->file->move(public_path('uploads'), $fileName);
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);

        }

    }

  
    public function download(){
    	$table = employee::all();
    	// return $table;die;
	    $filename = "tweets.csv";
	    $handle = fopen($filename, 'w+');
	    fputcsv($handle, array('tweet text', 'screen name', 'name', 'created at'));

	    foreach($table as $row) {
	        fputcsv($handle, array($row['name'], $row['email'], $row['password'], $row['created_at']));
	    }

	    fclose($handle);

	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );

	    return Response::download($filename, 'tweets.csv', $headers);
    }

    public function sampleFile(){
        // return "hi........";die;
    	
	    $filename = "employee.xlsx";
	    $handle = fopen($filename, 'w+');
	    fputcsv($handle, array('Name', 'Last Name', 'Technology', 'DOB(YYYY-MM-DD)' ,'Mobile Number' ,'Office Location','Home Location'  ,'Office Mail Id' , 'Personal Mail Id', 'Skype Id' , 'Passport Available', 'Degree' ,'Year Of Passing', 'Specialization' , 'Certification' ,'Total Year Of Exp' , 'Privious Experience' , 'Team Lead' , 'Designation' , 'Interview Availability','On Bench','Salary Cadre', 'Date Of Joining' ,'On Bench Since' ));

	    fclose($handle);

	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );

	    return Response::download($filename, 'employee.xlsx', $headers);
    }


}
