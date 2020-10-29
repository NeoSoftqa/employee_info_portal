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
                  <div class="card-body">
                      <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Employees Personal Information
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

                              @if(session()->has('message'))
                                  <div class="alert alert-success">
                                      {{ session()->get('message') }}
                                  </div>
                              @endif

                              <div class="card-body">

                                <form class="form-horizontal" formname="personalDetails"action="{{url('employee_view/1')}}" method="post">
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
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/ value="{{$employee_details['dob']}}">
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    </div>


                                  <label  class="col-sm-2 col-form-label">Mobile Number</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="mobile_no" value="{{$employee_details['mobile_no']}}" id="" placeholder="Mobile Number">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Office location {{ $employee_details['office_location'] }}

                                  </label>
                                      <div class="col-sm-4
                                      ">

                                        <select class="form-control" name="office_location" >
                                          <option value="">select Office location</option>
                                          @foreach($locationData as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['office_location'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                  



                                  <label  class="col-sm-2 col-form-label">Home Location</label> 
                                  <div class="col-sm-4
                                      ">
                                        <select class="form-control" name="office_location" >
                                          <option value="">select Office location</option>
                                          @foreach($locationData as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['home_location'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
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
                                      <input type="radio" value="yes" name="interview_availability" >Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" style="margin: 0px 0px 0px 10px;" value="no" name="interview_availability" checked="checked">No
                                    </label>

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
                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Educational Details
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">

                                <form class="form-horizontal" formname="educationalDetails" action="{{url('employee_view/1')}}" method="post">
                                  <input type="hidden" value="educationalDetails" name="educationalDetails">
                                  {{ csrf_field() }}

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Degree</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Degree">
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Passing Year</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Last Name">
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

                                </div>



                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Specialization</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Specialization">
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Certification</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Certification">
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
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Other Details
                                </button>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                  <form class="form-horizontal" >
                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Interview Availability</label>
                                
                                  <div class="col-sm-4">
                                    <label class="radio-inline">
                                      <input type="radio" value="yes" name="interview_availability" >Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" style="margin: 0px 0px 0px 10px;" value="no" name="interview_availability" checked="checked">No
                                    </label>
                                  </div>


                                  <label  class="col-sm-2 col-form-label">Salary cadre</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Salary cadre">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Joining Date</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Joining date">
                                  </div>

                                  <label for="" class="col-sm-2 col-form-label">Designation</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="Designation">
                                  </div>
                                </div>

                                <div class="form-group row">
                                      <label for="" class="col-sm-2 col-form-label">Team Lead</label>
                                      <div class="col-sm-4
                                      ">
                                        <select class="form-control" id="team_lead">
                                          @foreach($teamLead as $key => $value)
                                          <option value="{{$key}}" @if( $employee_details['team_lead'] == $key ) selected @endif>{{$value}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                  </div>


                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    
                                  </div>
                                </div>

                                <div class="card-footer">
                                  <button type="submit" class="btn btn-info">Submit</button>
                                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                                </div>

                              </form>
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
});
</script>
@endsection
