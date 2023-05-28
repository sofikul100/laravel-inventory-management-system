@extends('software_master')
@section('title')
user view page 
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
                    <h3 class="pt-2 pl-2">User View </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="table" id="example1">
                              <thead>
                              <tr>
                               <th scope="col">SL NO </th>
                                <th scope="col">NAME</th>
                                 <th scope="col">USER_TYPE</th>
                                  <th scope="col">EMAIL</th>
                                  <th scope="col">ACTION </th>
                                   </tr>
                                  </thead>
                                <tbody>
                      @foreach($user_view as $key=>$user_data)            
                              <tr>
                         <th scope="row">{{ $key + 1 }}</th>
                          <td>{{ $user_data->name }}</td>
                         <td>{{ $user_data->user_type }}</td>
                         <td>{{ $user_data->email }}</td>
                         <td>
                           <a href="{{ route('user.edit',$user_data->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                           <a href="{{ route('user.delete',$user_data->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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