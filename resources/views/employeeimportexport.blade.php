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
                <h3 class="card-title">Create Employee</h3>
              </div>

              <div class="card bg-light mt-3">
                  <div class="card-header">
                      Import And Export Data
                  </div>
                  <div class="card-body">

                  @if (session('status'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ session('status') }}</strong>
                  </div>
                  <!-- <img src="uploads/{{ Session::get('file') }}"> -->
                  @endif

                  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <!-- <img src="uploads/{{ Session::get('file') }}"> -->
        @endif

        @if ($message = Session::get('file_error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <!-- <img src="uploads/{{ Session::get('file') }}"> -->
        @endif

                  @if (isset($errors) && $errors->any() )
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              {{$error}}
                          @endforeach
                      </div>
                  @endif

                  @if (session()->has('failures') )
                      <table class="table table-danger">
                          <tr>
                              <th>row</th>
                              {{--<th>Attrubutes</th>--}}
                              <th>Errors</th>
                              <th>Value</th>
                          </tr>
                          @foreach(session()->get('failures') as $validation)
                              <tr>
                                  <td>{{ $validation->row() }}</td>
                                  {{--<td>{{ $validation->attribute() }}</td>--}}
                                  <td>
                                      <ul>
                                          @foreach($validation->errors() as $e)
                                          <li> {{ $e }} </li>
                                          @endforeach
                                      </ul>
                                  </td>
                                  <td>
                                      {{$validation->values()[$validation->attribute()]}}
                                  </td>
                              </tr>
                          @endforeach
                      </table>
                  @endif


                      <form action="{{ route('employee_import') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="file" class="form-control">
                          <br>
                          <button class="btn btn-success">Import Employee Data</button>
                          <a class="btn btn-warning" href="{{ route('employee_export') }}">Export Employee Data</a>


                          <a class="btn btn-info" href="{{ url('sample_file') }}">Download Sample File</a>

                          
                      </form>
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
