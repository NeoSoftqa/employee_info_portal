@extends('layouts.index')

@section('content')
<!-- data tables links-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  alert("hii");
  $(".btn-show").click(function(){
      $.ajax({
        type: "GET",
        url: '{{ url('validate_file') }}',
        dataType: "html",
          success: function(result){
            alert(result);
          $("#div1").append(result);
        }
    });
  });
});
</script>

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
        <!-- Info boxes -->
        <div class="container-fluid">
       
        <div class="row">
          <div class="col-md-12">
           <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Employee</h3>
              </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <!-- <img src="uploads/{{ Session::get('file') }}"> -->
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


              <form method="Post" action="{{url('import')}}" enctype="multipart/form-data">  
                @csrf  
                <div class="form-group row mt-2">
                    <label for="" class="col-sm-4 ml-2 col-form-label">Upload Employee Data</label> <br>
                        <div class="col-sm-4">
                            <input  type='file' name='file' placeholder="First Name">
                        </div>
                </div>
                <div class="card-footer">
                        <button type="submit" name='submit' value='Import' class="btn btn-info">Upload File</button>
                </div>
                  
                </form>


                @if(count($docs)>0)
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">File</th>
                    <th scope="col">Uploaded By</th>
                    <th scope="col">Uploaded Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($docs as $user)
                    <th scope="row">1</th>
                    <td>{{ $user->doc_name }}</td>
                    <td>{{ $user->created_by }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><button type="submit" name='submit' value='Import' class="btn btn-info btn-sm">Delete</button>
                      <button type="submit" name='submit' value='Import' class="btn btn-info btn-sm btn-show">Show</button></td>
                    @endforeach
                  </tr>
                </tbody>
              </table>
              @endif


              <div>
                <p id="div1"> </p>
              </div>


                <form method="get" action="{{url('show_data')}}" enctype="multipart/form-data">                 
                <div class="card-footer">
                        <button type="submit" name='submit' value='show data' class="btn btn-info">Validate And Approve</button>
                </div>
                </form>


                <div class="card-footer">
                 <a href="{{url('sample_file')}}">Download sample file</a>
                </div>

            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
        <!-- /.row -->

       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
