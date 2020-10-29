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
                <h3 class="card-title">Create User</h3>
              </div>

              <div class="card bg-light mt-3">
                  <div class="card-header">
                      <div class="card-body">

                        @if(session()->has('message'))
                                  <div class="alert alert-success">
                                      {{ session()->get('message') }}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </div>
                              @endif

                                <form class="form-horizontal" action="{{url('user_create')}}" method="post">
                                  {{ csrf_field() }}

                                <input type="hidden" name="form" value ="personalDetails">

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">First Name</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" name="firstname" value="" id="" placeholder="First Name">
                                    @if($errors->has('firstname'))
                                        <div class="error">{{ $errors->first('firstname') }}</div>
                                    @endif
                                  </div>
                                </div>


                                <div class="form-group row">
                                  <label  class="col-sm-2 col-form-label">Email Id</label>
                                  <div class="col-sm-4">
                                    <input type="email" class="form-control" name="email" value="" id="" placeholder="Email Id">
                                    @if($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                  </div>
                                </div>


                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Password</label>
                                  <div class="col-sm-4">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @if($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">Password</label>
                                  <div class="col-sm-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="off" placeholder="Confirm Password" >

                                    @if($errors->has('paspassword_confirmationsword'))
                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                  </div>
                                </div>



                                <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label">User Type</label>
                                  
                                  <div class="col-sm-4">
                                    @foreach($role as $role_id => $userRole)
                                    <label class="radio-inline">
                                      <input type="radio" style="margin: 0px 0px 0px 10px;" value="{{ $role_id }}" name="user_type">{{ $userRole }}
                                    </label>
                                    @endforeach
                                    

                                    @if($errors->has('user_type'))
                                        <div class="error">{{ $errors->first('user_type') }}</div>
                                    @endif

                                  </div>
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
                  <div class="card-body">
                      
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
