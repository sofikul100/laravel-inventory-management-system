@extends('software_master')
@section('title')
    Invoice Add Form
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
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="pt-2 pl-2">Invoice Search</h3>
                        <div class="card-body">
                        <form action="{{ route('invoice.show') }}" method="POST">
                            @csrf
                               <div class="row">
                                        <div class="form-group col-md-6">
                                        <label for="date">Start Date </label>
                                        <input type="date" id="date" class="form-control date" placeholder="date"
                                        style="border-radius:0px" name="start_date">
                                        <span id="date_validate" style="color:red"></span>
                                       </div>
                                  <div class="form-group col-md-6">
                                    <label for="date">End Date </label>
                                    <input type="date" id="date" class="form-control date" placeholder="date"
                                        style="border-radius:0px" name="end_date">
                                    <span id="date_validate2" style="color:red"></span>
                                    </div>
                               
                               </div>
                        
                           <input style="border-radius:0px;" type="submit" value="Search Invoice" class="btn btn-sm btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection
