@extends('software_master')
@section('title')
customer  view page 
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
                    <h3 class="pt-2 pl-2">Customer  View </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="table" id="example1">
                              <thead>
                              <tr>
                               <th scope="col">SL NO </th>
                                <th scope="col">CUSTOMER NAME</th>
                                 <th scope="col">EMAIL</th>
                                  <th scope="col">PHONE</th>
                                  <th scope="col">ADDRESS</th>
                                  <th scope="col">ACTION </th>
                                   </tr>
                                  </thead>
                                <tbody>
                      @foreach($customer_view as $key=>$customer_data)            
                              <tr>
                         <th scope="row">{{ $key + 1 }}</th>
                          <td>{{ $customer_data->name }}</td>
                         <td>{{ $customer_data->email }}</td>
                         <td>{{ $customer_data->phone }}</td>
                         <td>{{ $customer_data->address }}</td>
                         <td>
                           <a href="{{ route('customer.edit',$customer_data->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                           <a href="{{ route('customer.delete',$customer_data->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                         </td>
                           </tr>
                      @endforeach
                     </tbody>
                      </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




















  </div>



@endsection