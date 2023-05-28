@extends('software_master')
@section('title')
customer Edit Form  
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
                    <h3 class="pt-2 pl-2">Customer Edit </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                           <form action="{{ route('customer.update',$customer_edit->id) }}" method="POST">
                               @csrf
                               <div class="form-group">
                                   <label for="name">Customer Name </label>
                                   <input style="border-radius:0px" type="text" name="name" id="name" class="form-control"  value="{{ $customer_edit->name }}" required>
                               </div>
                               <div class="form-group">
                                   <label for="phone">Phone No </label>
                                   <input style="border-radius:0px" type="number" name="phone" id="phone" class="form-control"  value="{{ $customer_edit->phone }}" required>
                               </div>
                               <div class="form-group">
                                   <label for="email">Email </label>
                                   <input style="border-radius:0px" type="email" name="email" id="email" class="form-control" value="{{ $customer_edit->email }}">
                               </div>
                               <div class="form-group">
                                   <label for="address">Address </label>
                                   <input style="border-radius:0px"  type="text" name="address" id="address" class="form-control"  value="{{ $customer_edit->address }}" required>
                               </div>
                               <input style="border-radius:0px"  type="submit" value="UPDATE" class="btn btn-info">
                           </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




















  </div>



@endsection