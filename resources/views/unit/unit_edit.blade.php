@extends('software_master')
@section('title')
unit update  form 
@endsection
@section('pos')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <h3 class="pt-2 pl-2">Unit Add </h3>
                    <div class="card-body">
                       <form action="{{ route('units.update',$unit_edit->id) }}" method="POST">
                        @csrf
                           <div class="form-group">
                               <label for="name">Unit  </label>
                               <input style="border-radius:0px" type="text" name="name" id="name" value="{{ $unit_edit->name }}" required class="form-control">
                           </div>
                           <div class="form-group">
                               <input style="border-radius:0px" type="submit" class="btn btn-info" value="UPDATE">
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




















  </div>



@endsection