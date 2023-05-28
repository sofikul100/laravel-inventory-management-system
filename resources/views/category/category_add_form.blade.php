@extends('software_master')
@section('title')
Category add  form 
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
                    <h3 class="pt-2 pl-2">Category Add </h3>
                    <div class="card-body">
                       <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                           <div class="form-group">
                               <label for="name">Category Name   </label>
                               <input style="border-radius:0px" type="text" name="name" id="name" placeholder="Category Name" required class="form-control">
                              @if($errors->has('name'))
                                  @foreach($errors->get('name') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <input style="border-radius:0px" type="submit" class="btn btn-info" value="ADD">
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




















  </div>



@endsection