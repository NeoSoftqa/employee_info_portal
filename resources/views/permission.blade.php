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
                <h3 class="card-title">Set Permissions</h3>
              </div>

              <div class="card bg-light mt-3">
                 <div class="card-body">
                      <div id="accordion">
                          <div class="card">
                            

                              <div class="card-body">
                                <div class="form-group row">

                                  <form class="form-horizontal" formname="personalDetails"action="{{ URL('permissions' )}}" method="post">
                                  {{ csrf_field() }}


                                  <div class="list-group">

                                    

                                  @foreach($roles as $role_id => $role_name)
                                  
                                  <h5 class="list-group-item-heading">{{ $role_name }}</h5>
                                      <input type="hidden" name="role_id" value="{{ $role_id }}">
                                  <div class="checkbox">
                                    @foreach($permissions as $key => $name)
                                    <label>

                                     {{ $name }} , 
                                    </label>

                                    @endforeach
                                  </div>

                                  <div class="form-group row" style="margin: 0% 0% 0% 87%;">
                                  <button type="submit" class="btn btn-info float-right" >View</button>
                                  </div>

                                  <hr>


                                  @endforeach
                                  </div>


                                  
                                  
                                  
                                </form>
                                </div>
                              </div>
                            <!-- </div> -->
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

@endsection
