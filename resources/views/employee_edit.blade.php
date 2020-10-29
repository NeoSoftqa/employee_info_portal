@extends('layouts.index')

@section('content')


<div class="container">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
           <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Employee Information</h3>
              </div>

              <div class="card bg-light mt-3">
                  <div class="card-header">
                      <!-- Employee Information -->
                      <h5>Designation</h5><br>
                      <h5>Team Lead</h5>
                  </div>
                  
                    <div class='panel panel1'>
                        <div class='header'>
                          <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Employees Personal Information
                                </button>
                              </h5>
                            </div>
                        </div>
                        <div class='contents'>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

                              @if(session()->has('message'))
                                  <div class="alert alert-success">
                                      {{ session()->get('message') }}
                                  </div>
                              @endif

                              <div class="card-body">
                                @if(session()->has('message'))
                                  <div class="alert alert-success">
                                      {{ session()->get('message') }}
                                  </div>
                              @endif
                                <form class="form-horizontal" formname="personalDetails"action="{{ URL('employee_edit/'.$id )}}" method="post">
                                  {{ csrf_field() }}

                                <input type="hidden" name="form" value ="personalDetails">
                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">First Name</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="firstname" value="{{$employee_details['name']}}" id="" placeholder="First Name">
                                    @if($errors->has('firstname'))
                                        <div class="error">{{ $errors->first('firstname') }}</div>
                                    @endif
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Last Name</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="lastname" value="{{$employee_details['lastname']}}" id="" placeholder="Last Name">
                                    @if($errors->has('lastname'))
                                        <div class="error">{{ $errors->first('lastname') }}</div>
                                    @endif
                                  </div>
                                </div>

                            
                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Date of Birth</label>
                                  <div class="col-sm-4">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/ value="{{$employee_details['dob']}}" name="dob">
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    </div>


                                  <label  class="col-sm-2 col-form-label">Mobile Number</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="mobile_no" value="{{$employee_details['mobile_no']}}" id="" placeholder="Mobile Number">
                                    @if($errors->has('mobile_no'))
                                        <div class="error">{{ $errors->first('mobile_no') }}</div>
                                    @endif
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Office location {{ $employee_details['office_location'] }}</label>
                                      <div class="col-sm-4
                                      ">
                                        <select class="form-control" name="office_location" >
                                          <option value="">select Office location</option>
                                          @foreach($locationData as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['office_location'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
                                          @if($errors->has('office_location'))
                                              <div class="error">{{ $errors->first('office_location') }}</div>
                                          @endif
                                        </select>
                                      </div>
                                  

                                  <label  class="col-sm-2 col-form-label">Home Location</label> 
                                  <div class="col-sm-4
                                      ">
                                        <select class="form-control" name="home_location" >
                                          <option value="">select Office location</option>
                                          @foreach($locationData as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['home_location'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
                                          @if($errors->has('home_location'))
                                              <div class="error">{{ $errors->first('home_location') }}</div>
                                          @endif
                                        </select>
                                      </div>
                                </div>


                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Office Mail Id</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control"name="offce_mail_id" value="{{$employee_details['office_mail_id']}}" id="" placeholder="Office location">
                                    @if($errors->has('offce_mail_id'))
                                        <div class="error">{{ $errors->first('offce_mail_id') }}</div>
                                    @endif
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Personal Mail Id</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="personal_mail_id"id="" value="{{$employee_details['personal_mail_id']}}"placeholder="Personal mail id">
                                    @if($errors->has('personal_mail_id'))
                                        <div class="error">{{ $errors->first('personal_mail_id') }}</div>
                                    @endif
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Skype Id</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="skype_id" id="" value="{{$employee_details['skype_id']}}" placeholder="Skype id">
                                    @if($errors->has('skype_id'))
                                        <div class="error">{{ $errors->first('skype_id') }}</div>
                                    @endif
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Passport available</label>
                                  <div class="col-sm-4">
                                    <label class="radio-inline">
                                      <input type="radio" value="yes" name="passport" >Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" style="margin: 0px 0px 0px 10px;" value="no" name="passport" checked="checked">No
                                    </label>
                                    @if($errors->has('passport'))
                                              <div class="error">{{ $errors->first('passport') }}</div>
                                          @endif

                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-info float-right">Submit</button>
                                  <!-- <button type="submit" class="btn btn-default float-right">Cancel</button> -->
                                </div>
                              </form>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class='panel panel2'>
                        <div class='header'>
                          <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Educational Details
                                </button>
                              </h5>
                            </div>
                        </div>
                        <div class='contents'>
                            <div class="card-body">
                                @if(session()->has('educational_msg'))
                                  <div class="alert alert-success">
                                      {{ session()->get('educational_msg') }}
                                  </div>
                              @endif
                                <form class="form-horizontal" formname="educationalDetails" action="{{ URL('employee_edit/'.$id )}}" method="post">
                                  <input type="hidden" value="educationalDetails" name="formname">
                                  {{ csrf_field() }}

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Degree</label>
                                  <div class="col-sm-4">
                                    <select class="form-control department" name="degree" id="degree">
                                          <option value="">select Degree</option>
                                          <option value="BE" @if( $employee_details['degree'] == "BE" ) selected @endif>BE</option>
                                          <option value="Bsc" @if( $employee_details['degree'] == "Bsc" ) selected @endif>Bsc</option>
                                          
                                        </select>
                                    @if($errors->has('degree'))
                                        <div class="error">{{ $errors->first('degree') }}</div>
                                    @endif
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Passing Year</label>
                                  <div class="col-sm-4">
                                    <!-- <input type="text" class="form-control" id="" placeholder="Passing Year" name="passing_year"> -->
                                    <div class="input-group date" id="passingyear" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#passingyear"/ value="{{ $employee_details['passing_year'] }}"  name="passing_year">
                                        <div class="input-group-append" data-target="#passingyear" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if($errors->has('passing_year'))
                                        <div class="error">{{ $errors->first('passing_year') }}</div>
                                    @endif
                                  </div>
                                  
                                </div>


                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Department </label>
                                  <div class="col-sm-4
                                      ">
                                        <select class="form-control department" name="department" id="department">
                                          <option value="">select Department</option>
                                          @foreach($deptData as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['department'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('department'))
                                        <div class="error">{{ $errors->first('department') }}</div>
                                    @endif
                                      </div>
                                      


                                  <label  class="col-sm-2 col-form-label">Technology</label>
                                  <div class="col-sm-4
                                      ">
                                        <select class="form-control" name="technology" id="technology">
                                          <option value="">select Technology</option>
                                         @foreach($techData as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['technology'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      @if($errors->has('technology'))
                                        <div class="error">{{ $errors->first('technology') }}</div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Specialization</label>
                                  <div class="col-sm-4
                                      ">
                                        <select class="form-control" name="specialization" id="specialization">
                                          <option value="">Select specialization</option>
                                          <option value="IT" @if( $employee_details['specialization'] == "IT" ) selected @endif>IT</option>
                                          <option value="Computers" @if( $employee_details['specialization'] == "Computers" ) selected @endif>Computers</option>
                                          <option value="Electronics" @if( $employee_details['specialization'] == "Electronics" ) selected @endif>Electronics</option>
                                        </select>

                                        @if($errors->has('specialization'))
                                            <div class="error">{{ $errors->first('specialization') }}</div>
                                        @endif

                                      </div>
                                      


                                  <label  class="col-sm-2 col-form-label">Certification</label>
                                  <div class="col-sm-4">
                                        <input type="text" class="form-control" name="certification"id="" placeholder="Certification">
                                      </div>
                                </div>

                                <div class="card-footer">
                                  <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>

                              </form>

                              </div>
                        </div>
                    </div>

                    <div class='panel panel3'>
                        <div class='header'>
                          <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Employment Details
                                </button>
                              </h5>
                            </div>
                        </div>
                        <div class='contents'>
                          <div class="card-body">
                            @if(session()->has('employement_msg'))
                                  <div class="alert alert-success">
                                      {{ session()->get('employement_msg') }}
                                  </div>
                              @endif
                                  <form class="form-horizontal" formname="employementDetails" action="{{ URL('employee_edit/'.$id )}}" method="post">
                                  <input type="hidden" value="employementDetails" name="formname">
                                  {{ csrf_field() }}
                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Interview Availability</label>
                                
                                  <div class="col-sm-4">
                                    <label class="radio-inline">
                                      <input type="radio" value="yes" name="interview_availability" >Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" style="margin: 0px 0px 0px 10px;" value="no" name="interview_availability" checked="checked">No
                                    </label>
                                    @if($errors->has('interview_availability'))
                                            <div class="error">{{ $errors->first('interview_availability') }}</div>
                                        @endif
                                  </div>


                                  <label  class="col-sm-2 col-form-label">Salary cadre</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Salary cadre" name="salary_cadre" value="{{ $employee_details['salary_cadre'] }}">
                                  </div>
                                  @if($errors->has('salary_cadre'))
                                            <div class="error">{{ $errors->first('salary_cadre') }}</div>
                                  @endif
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Joining Date</label>
                                  <div class="col-sm-4">
                                  <div class="input-group date" id="joiningdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#joiningdate"/ value="{{ $employee_details['joining_date'] }}" name="joining_date">
                                        <div class="input-group-append" data-target="#joiningdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if($errors->has('joining_date'))
                                            <div class="error">{{ $errors->first('joining_date') }}</div>
                                    @endif
                                  </div>

                                  <label for="" class="col-sm-2 col-form-label">Designation</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Designation" name="designation" value="{{ $employee_details['designation'] }}">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Team Lead</label>
                                      <div class="col-sm-4
                                      ">
                                        <select class="form-control" name="team_lead" id="team_lead">
                                          @foreach($teamLead as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['team_lead'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('team_lead'))
                                            <div class="error">{{ $errors->first('team_lead') }}</div>
                                        @endif
                                      </div>

                                  <label  class="col-sm-2 col-form-label">On Bench Since</label>
                                  <div class="col-sm-4">
                                  <div class="input-group date" id="on_bench" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#on_bench"/ value="{{ $employee_details['on_bench_since'] }}" name="on_bench">
                                        <div class="input-group-append" data-target="#on_bench" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if($errors->has('on_bench'))
                                            <div class="error">{{ $errors->first('on_bench') }}</div>
                                    @endif
                                  </div>

                                </div>



                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    
                                  </div>
                                </div>

                                <div class="card-footer">
                                  <button type="submit" class="btn btn-info float-right">Submit</button>
                                  
                                </div>

                              </form>
                              </div>
                            </div>
                        </div>

                   

                    <div class='panel panel4'>
                        <div class='header'>
                          <div class="card-header" id="headingFour">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#headingFour" aria-expanded="false" aria-controls="headingFour">
                                  Noe Work History
                                </button>
                              </h5>
                            </div>
                        </div>
                        <div class='contents'>
                          <div class="card-body">
                            @if(session()->has('work_msg'))
                                  <div class="alert alert-success">
                                      {{ session()->get('work_msg') }}
                                  </div>
                              @endif
                                  <form class="form-horizontal" formname="workHistory" action="{{ URL('employee_edit/'.$id )}}" method="post">
                                  <input type="hidden" value="workHistory" name="formname">

                                  {{ csrf_field() }}
                                    

                                    

                                    <div id="fieldList">

                                    @if($employee_details['work_history']!== null)
                                    @php $work_hist = json_decode($employee_details['work_history'],true); 

                                    $count_work_history = count($work_hist);
                                    @endphp

                                      @for($i=0;$i<$count_work_history;$i++)

                                        <h6 class="text-info">Client Deatils</h6>
                                       <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Client Name</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="" placeholder="Client Name" name="client_name[]" value="{{ $work_hist[$i]['client_name'] }}">
                                          @if($errors->has('client_name'))
                                            <div class="error">{{ $errors->first('client_name') }}</div>
                                          @endif
                                        </div>

                                        <label  class="col-sm-2 col-form-label">Project Name</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="" placeholder="Project Name" name="project_name[]" value="{{ $work_hist[$i]['project_name'] }}">
                                          @if($errors->has('project_name'))
                                            <div class="error">{{ $errors->first('project_name') }}</div>
                                          @endif
                                        </div>
                                      </div>

                                      <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Start Date</label>
                                        <div class="col-sm-4">
                                          <div class="input-group date" id="start_date" data-target-input="nearest">
                                                <input type="text" value="{{ $work_hist[$i]['start_date'] }}" class="form-control datetimepicker-input" data-target="#start_date"/ value="" name="start_date[]" >
                                                <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @if($errors->has('start_date'))
                                            <div class="error">{{ $errors->first('start_date') }}</div>
                                          @endif
                                          </div>

                                        <label  class="col-sm-2 col-form-label">End Date</label>
                                        <div class="col-sm-4">
                                          <div class="input-group date" id="end_date" data-target-input="nearest">
                                                <input type="text" value="{{ $work_hist[$i]['end_date'] }}" class="form-control datetimepicker-input" data-target="#end_date"/ value="" name="end_date[]" >
                                                <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @if($errors->has('end_date'))
                                            <div class="error">{{ $errors->first('end_date') }}</div>
                                          @endif
                                          </div>
                                      </div>

                                      <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Duration</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="" placeholder="Duration" name="duration[]" value="{{ $work_hist[$i]['duration'] }}">
                                          @if($errors->has('duration'))
                                            <div class="error">{{ $errors->first('duration') }}</div>
                                          @endif
                                        </div>

                                        <label  class="col-sm-2 col-form-label">Technology</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="" placeholder="Technology" name="technology[]" value="{{ $work_hist[$i]['technology'] }}">
                                          @if($errors->has('technology'))
                                            <div class="error">{{ $errors->first('technology') }}</div>
                                          @endif
                                        </div>
                                      </div>
                                      @endfor
                                      @endif
                                      </div>

                                     
                                      <button type="button" class="btn btn-info float-right" id="addMore">Add more Projects</button>
                                      <br>
                                      <br>
                                      
                                      <div class="card-footer">
                                  <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>

                                  </form>

                              </div>
                            </div>
                        </div>

                      <div class='panel panel5'>
                        <div class='header'>
                          <div class="card-header" id="headingFive">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                  Interview History
                                </button>
                              </h5>
                            </div>
                        </div>
                        <div class='contents'>
                          <div class="card-body">
                                  @if(session()->has('interview_msg'))
                                  <div class="alert alert-success">
                                      {{ session()->get('interview_msg') }}
                                  </div>
                                  @endif

                                  @if($employee_details['interview_history'] !== null)
                                  <form class="form-horizontal" formname="interviewDetails" action="{{ URL('employee_edit/'.$id )}}" method="post">
                                  <input type="hidden" value="interviewDetails" name="formname">
                                  {{ csrf_field() }}

                                   <div id="interview_details">
                                    
                                    @php $interw_history = json_decode($employee_details['interview_history'],true); 

                                    $count_work_history = count($interw_history);
                                    @endphp

                                    @for($i=0;$i<$count_work_history;$i++)
                                    <h6 class="text-info">Interview Deatils</h6>
                                       <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Client Name</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="" placeholder="Client Name" name="client_name[]" value="{{ $interw_history[$i]['client_name'] }}">
                                          @if($errors->has('client_name'))
                                              <div class="error">{{ $errors->first('client_name') }}</div>
                                          @endif
                                        </div>

                                        <label  class="col-sm-2 col-form-label">First Round Date</label>
                                        <div class="col-sm-4">
                                          <div class="input-group date" id="first_round" data-target-input="nearest">
                                                <input type="text" name="first_round[]" value="{{ $interw_history[$i]['first_round'] }}" class="form-control datetimepicker-input" data-target="#first_round"/ >
                                                <div class="input-group-append" data-target="#first_round" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                          </div>
                                          @if($errors->has('first_round'))
                                        <div class="error">{{ $errors->first('first_round') }}</div>
                                    @endif
                                      </div>

                                      <div class="form-group row">
                                        <label  class="col-sm-2 col-form-label">Second Round Date</label>
                                        <div class="col-sm-4">
                                          <div class="input-group date" id="second_round" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#second_round"/ value="{{ $interw_history[$i]['second_round'] }}" name="second_round[]" >
                                                <div class="input-group-append" data-target="#second_round" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @if($errors->has('secound_round'))
                                                <div class="error">{{ $errors->first('secound_round') }}</div>
                                            @endif
                                          </div>

                                        <label  class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                        <select class="form-control " name="status[]" >
                                          <option value="">select status</option>
                                          

                                          <option value="select" @if( $interw_history[$i]['status'] == 'select' ) selected @endif>selected</option>

                                          <option value="reject" @if( $interw_history[$i]['status'] == 'reject' ) selected @endif>rejected</option>


                                          {{--@foreach($deptData as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['status'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach--}}
                                        </select>
                                      </div>
                                      @if($errors->has('status'))
                                        <div class="error">{{ $errors->first('status') }}</div>
                                    @endif
                                      </div>
                                      @endfor
                                     
                                  </div>

                                  <div class="card-footer">
                                  <button type="button" style="margin-left: 10px;" class="btn btn-info float-right" id="addMoreInterviews">Add more Projects</button>

                                  <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>
                                  </form>

                                  @else



                                  <form class="form-horizontal" formname="interviewDetails" action="{{ URL('employee_edit/'.$id )}}" method="post">
                                        <input type="hidden" value="interviewDetails" name="formname">
                                        {{ csrf_field() }}

                                        
                                         <div id="interview_details1">

                                          <h6 class="text-info">Interview Deatils</h6>
                                             <div class="form-group row" >
                                              <label  class="col-sm-2 col-form-label">Client Name</label>
                                              <div class="col-sm-4">
                                                <input type="text" class="form-control" id="" placeholder="Client Name" name="client_name[]" value="">
                                                @if($errors->has('client_name'))
                                                    <div class="error">{{ $errors->first('client_name') }}</div>
                                                @endif
                                              </div>

                                              <label  class="col-sm-2 col-form-label">First Round Date</label>
                                              <div class="col-sm-4">
                                                <div class="input-group date" id="first_round" data-target-input="nearest">
                                                      <input type="text" name="first_round[]" value="" class="form-control datetimepicker-input" data-target="#first_round"/ >
                                                      <div class="input-group-append" data-target="#first_round" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                      </div>
                                                  </div>
                                                </div>
                                                @if($errors->has('first_round'))
                                              <div class="error">{{ $errors->first('first_round') }}</div>
                                          @endif
                                            </div>

                                            <div class="form-group row">
                                              <label  class="col-sm-2 col-form-label">Second Round Date</label>
                                              <div class="col-sm-4">
                                                <div class="input-group date" id="second_round" data-target-input="nearest">
                                                      <input type="text" class="form-control datetimepicker-input" data-target="#second_round"/ value="" name="second_round[]" >
                                                      <div class="input-group-append" data-target="#second_round" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                      </div>
                                                  </div>
                                                  @if($errors->has('secound_round'))
                                                      <div class="error">{{ $errors->first('secound_round') }}</div>
                                                  @endif
                                                </div>

                                              <label  class="col-sm-2 col-form-label">Status</label>
                                              <div class="col-sm-4">
                                              <select class="form-control " name="status[]" >
                                                <option value="">select status</option>
                                                <option value="select">selected</option>
                                                <option value="reject" >rejected</option>
                                              </select>
                                            </div>
                                            @if($errors->has('status'))
                                                <div class="error">{{ $errors->first('status') }}</div>
                                            @endif
                                              </div>
                                           
                                        <div class="card-footer">
                                        
                                            <button type="submit" class="btn btn-info float-right">Submit</button>
                                      </div>
                                    </div>
                              </form>

                                  @endif

                              </div>
                            </div>
                        </div>    
                    </div>

                    
                    </div>
              </div>


            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

<style type="text/css">
  .error{
    color:red;
  }
</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
     
    $("#department").change(function(){
        var tech = $(this).children("option:selected").val();
        $.ajax({
          type:"get",
          url: '{{url("getTechnologyById")}}/'+tech,
          dataType: 'json',
           success: function(result){
            $('#technology').empty();
            var array = $.map(result, function(value, index) {
                 $('#technology').append('<option value="' + index + '">' + value + '</option>');
            });
        }});

    });

// following code is to open or close selected accordion //
   $('.panel .header').click(function(){
    if($(this).parent().hasClass("open")){
        $(this).parent().find(".contents").slideUp();
        $(this).parent().removeClass("open");
    }
   else {
        $(this).parent().find(".contents").slideDown();
        $(this).parent().addClass("open");
    }
        $(this).parent().siblings().find(".contents").slideUp();
});

// $('.externalLink').click(function(){
//     $('.panel2 .contents').slideDown().parent().addClass("open");
    
//     $(this).parent().siblings().find(".contents").slideUp();
// });



var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

var tech = getUrlParameter('accordion');


if(tech==1){
  $('.panel1 .contents').slideDown().parent().addClass("open");
    
    $(this).parent().siblings().find(".contents").slideUp();
}
if(tech==2){
  $('.panel2 .contents').slideDown().parent().addClass("open");
    
    $(this).parent().siblings().find(".contents").slideUp();
}
if(tech==3)
{
  $('.panel3 .contents').slideDown().parent().addClass("open");
    
    $(this).parent().siblings().find(".contents").slideUp();
}
if(tech==4)
{
  $('.panel4 .contents').slideDown().parent().addClass("open");
    
    $(this).parent().siblings().find(".contents").slideUp();
}
if(tech==5)
{
  $('.panel5 .contents').slideDown().parent().addClass("open");
    
    $(this).parent().siblings().find(".contents").slideUp();
}

});


$(function() {

  $("#addMore").click(function(e) {
    e.preventDefault();
    // $("#fieldList").append("<li>&nbsp;</li>");
    $("#fieldList").append("<hr><h6 class='text-info'>Client Deatils</h6><div class='form-group row'><label  class='col-sm-2 col-form-label'>Client Name</label><div class='col-sm-4'><input type='text' class='form-control' id='' placeholder='Client Name' name='client_name[]'></div><label  class='col-sm-2 col-form-label'>Project Name</label><div class='col-sm-4'><input type='text' class='form-control' id='' placeholder='Project Name' name='project_name[]'></div></div><div class='form-group row'><label  class='col-sm-2 col-form-label'>Start Date</label><div class='col-sm-4'><input type='text' class='form-control datetimepicker-input' data-target='#start_date' placeholder='Start Date' name='start_date[]'></div><label  class='col-sm-2 col-form-label'>End Date</label><div class='col-sm-4'><input type='text' class='form-control datetimepicker-input' data-target='#end_date'/ placeholder='End Date' name='end_date[]'></div></div><div class='form-group row'><label  class='col-sm-2 col-form-label'>Duration</label><div class='col-sm-4'><input type='text' class='form-control' id='' placeholder='Duration' name='duration[]'></div><label  class='col-sm-2 col-form-label'>Technology</label><div class='col-sm-4'><input type='text' class='form-control' id='' placeholder='Technology' name='technology[]'></div></div>");
    
  });


  $("#addMoreInterviews").click(function(e) {
    e.preventDefault();
    // $("#fieldList").append("<li>&nbsp;</li>");
    $("#interview_details").append("<hr><h6 class='text-info'>Interview Details</h6><div class='form-group row' ><label  class='col-sm-2 col-form-label'>Client Name</label><div class='col-sm-4'><input type='text' name='client_name[]' class='form-control' id='' placeholder='Client Name' ></div><label  class='col-sm-2 col-form-label'>First Round Date</label><div class='col-sm-4'><input type='text' name='first_round[]' class='form-control' id='' placeholder='First Round' ></div></div><div class='form-group row'><label  class='col-sm-2 col-form-label'>Second Round Date</label><div class='col-sm-4'><input type='text' name='second_round[]' class='form-control'  id='' placeholder='Second Round'></div><label  class='col-sm-2 col-form-label'>Status</label><div class='col-sm-4'><select name='status[]' class='form-control'  id=''><option value=''>select Status</option><option value='selected'>selected</option><option value='rejected'>rejected</option></select></div></div>");
    
  });

});

</script>
<style type="text/css">
  .contents {display:none; border: 1px solid #ccc; }
</style>

@endsection
