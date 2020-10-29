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
                  <!-- <div class="card-header">
                  </div> -->
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

                              <div class="card-body">

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">First Name</label>
                                  <div class="col-sm-4">
                                    {{$employee_details['name']}}
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Last Name</label>
                                  <div class="col-sm-4">
                                    {{$employee_details['lastname']}}
                                  </div>
                                </div>

                            
                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Date of Birth</label>
                                  <div class="col-sm-4">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        {{$employee_details['dob']}}         
                                    </div>
                                    </div>


                                  <label  class="col-sm-2 col-form-label">Mobile Number</label>
                                  <div class="col-sm-4">
                                    {{$employee_details['mobile_no']}}
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Office location</label>
                                      <div class="col-sm-4
                                      ">
                                      @php 
                                        $loc_id = $employee_details['office_location'];
                                      @endphp
                                       {{ $locationData[$loc_id] }}
                                      </div>
                                  

                                  <label  class="col-sm-2 col-form-label">Home Location</label> 
                                  <div class="col-sm-4
                                      ">
                                        @php 
                                        $loc_id = $employee_details['home_location'];
                                      @endphp
                                       {{ $locationData[$loc_id] }}
                                      </div>
                                </div>


                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Office Mail Id</label>
                                  <div class="col-sm-4">
                                    {{$employee_details['office_mail_id']}}
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Personal Mail Id</label>
                                  <div class="col-sm-4">
                                   {{$employee_details['personal_mail_id']}}
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Skype Id</label>
                                  <div class="col-sm-4">
                                    {{$employee_details['skype_id']}}
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Passport available</label>
                                  <div class="col-sm-4">
                                    {{$employee_details['passport_available'] }}

                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    
                                  </div>
                                </div>
                                
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

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Degree</label>
                                  <div class="col-sm-4">
                                    {{ $employee_details['degree'] }}
                                  </div>


                                  <label  class="col-sm-2 col-form-label">Passing Year</label>
                                  <div class="col-sm-4">
                                    {{ $employee_details['passing_year'] }}
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Department </label>
                                  <div class="col-sm-4">
                                    @if($employee_details['department'] !== null)
                                      @php 
                                        $dept = $employee_details['department'];
                                      @endphp
                                       {{ $deptData[$dept] }}
                                    @else
                                    -
                                    @endif
                                      </div>
                                      


                                  <label  class="col-sm-2 col-form-label">Technology</label>
                                 <div class="col-sm-4">
                                  @if($employee_details['department'] !== null)
                                      @php 
                                        $tech = $employee_details['technology'];
                                        
                                      @endphp
                                      {{ $techData[$tech] }}
                                  
                                  @endif
                                      </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Specialization</label>
                                  <div class="col-sm-4">
                                    {{ $employee_details['specialization'] }}
                                  </div>

                                  <label  class="col-sm-2 col-form-label">Certification</label> 
                                  <div class="col-sm-4">
                                    {{ $employee_details['certification'] }}
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Employement Details
                                </button>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                               
                                  <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Department </label>
                                  <div class="col-sm-4">
                                        {{ $deptData[$employee_details['department']] }}
                                  </div>


                                  <label  class="col-sm-2 col-form-label">Technology</label>
                                  <div class="col-sm-4">
                                        {{ $deptData[$employee_details['technology']] }}
                                  </div>

                                </div>


                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Interview Availability</label>
                                
                                  <div class="col-sm-4">
                                    {{ $employee_details['interview_availability'] }}
                                  </div>


                                  <label  class="col-sm-2 col-form-label">Salary cadre</label>
                                  <div class="col-sm-4">
                                    {{ $employee_details['salary_cadre'] }}
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Joining Date</label>
                                  <div class="col-sm-4">
                                    {{ $employee_details['joining_date'] }}
                                  </div>

                                  <label for="" class="col-sm-2 col-form-label">Designation</label>
                                  <div class="col-sm-4">
                                    {{ $employee_details['designation'] }}
                                  </div>
                                </div>

                                <div class="form-group row">
                                      <label for="" class="col-sm-2 col-form-label">Team Lead</label>
                                      <div class="col-sm-4">
                                        <div class="col-sm-4">
                                        {{ $teamLead[$employee_details['department']] }}
                                        </div>
                                      </div>

                                      <label for="" class="col-sm-2 col-form-label">On Bench Since</label>
                                      <div class="col-sm-4">
                                        <div class="col-sm-4">
                                        {{ $employee_details['on_bench_since'] }}
                                        </div>
                                      </div>
                                  </div>


                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="card">
                            <div class="card-header" id="headingFour">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  Neo Work History 
                                </button>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              
                              @if( $employee_details['work_history'] == null)
                              <h6 style="margin:3% 0% 3% 35%; color:red">No Work History Found</h6>
                              @else
                                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                @php $work_hist = json_decode($employee_details['work_history'],true); 

                                    $count_work_history = count($work_hist);

                                    @endphp

                                    @for($i=0;$i<$count_work_history;$i++)

                                      <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Client Name</label>
                                        <div class="col-sm-4">
                                          {{ $work_hist[$i]['client_name'] }}
                                        </div>

                                        <label  class="col-sm-2 col-form-label">Project Name</label>
                                        <div class="col-sm-4">
                                          {{ $work_hist[$i]['project_name'] }}
                                        </div>
                                      </div>

                                      <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Start Date</label>
                                        <div class="col-sm-4">
                                          <div class="input-group date" id="start_date" data-target-input="nearest">
                                                {{ $work_hist[$i]['start_date'] }}
                                            </div>
                                            
                                          </div>

                                        <label  class="col-sm-2 col-form-label">End Date</label>
                                        <div class="col-sm-4">
                                          {{ $work_hist[$i]['end_date'] }}
                                          </div>
                                      </div>

                                      <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Duration</label>
                                        <div class="col-sm-4">
                                          {{ $work_hist[$i]['duration'] }}
                                        </div>

                                        <label  class="col-sm-2 col-form-label">Technology</label>
                                        <div class="col-sm-4">
                                          {{ $work_hist[$i]['technology'] }}
                                        </div>
                                      </div>


                                    @endfor

                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    
                                  </div>
                                </div>

                              </div>
                            </div>
                              @endif
                            </div>
                          </div>

                          <div class="card">
                            <div class="card-header" id="headingFive">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                  Interview History
                                </button>
                              </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              @if( $employee_details['work_history'] == null)
                              <h6 style="margin:3% 0% 3% 35% ; color:red">No Interview History Found</h6>
                              @else
                              <div class="card-body">
                                @php $interw_history = json_decode($employee_details['interview_history'],true); 

                                  $count_work_history = count($interw_history);
                                    @endphp

                                    @for($i=0;$i<$count_work_history;$i++)
                                    <h6 class='text-info'>Interview Details</h6>
                                      <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Client Name</label>
                                        <div class="col-sm-4">
                                          {{ $interw_history[$i]['client_name'] }}
                                        </div>

                                        <label  class="col-sm-2 col-form-label">First Round Date</label>
                                        <div class="col-sm-4">
                                          {{ $interw_history[$i]['first_round'] }}
                                        </div>
                                      </div>

                                      <div class="form-group row" >
                                        <label  class="col-sm-2 col-form-label">Second Round Date</label>
                                        <div class="col-sm-4">
                                          
                                            {{ $interw_history[$i]['second_round'] }}
                                           
                                          </div>

                                        <label  class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                          {{ $interw_history[$i]['status'] }}
                                          </div>
                                      </div>

                                    @endfor

                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    
                                  </div>
                                </div>

                              </div>
                              @endif
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
