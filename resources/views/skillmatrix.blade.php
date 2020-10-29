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
                <h3 class="card-title">Employee Skills Matrix</h3>
              </div>

              <div class="card bg-light mt-3">
                  <div class="card-header">
                      Import And Export Data
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered table-responsive">
                          <tr> 
                              <th rowspan="2">Employee Name</th> 
                              <th colspan="6">Skills</th> 
                          </tr> 
                          <tr> 
                              <td>skill 1</td> 
                              <td>skill 2</td> 
                              <td>skill 3</td> 
                              <td>skill 4</td> 
                              <td>skill 5</td> 
                              <td>skill 6</td> 
                          </tr> 
                          <tr> 
                              <td>Priya</td> 
                              <td>Priya rating</td> 
                              <td>Priya rating</td> 
                              <td>Priya rating</td> 
                              <td>Priya rating</td> 
                              <td>Priya rating</td> 
                              <td>Priya rating</td> 
                          </tr>
                          <tr> 
                              <td>abc</td> 
                              <td>abc rating</td> 
                              <td>abc rating</td> 
                              <td>abc rating</td> 
                              <td>abc rating</td> 
                              <td>abc rating</td> 
                              <td>abc rating</td> 
                          </tr> 
                      </table> 
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
