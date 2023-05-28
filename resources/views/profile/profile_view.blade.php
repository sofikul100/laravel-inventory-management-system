@extends('software_master')
@section('title')
profile view page 
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
                  <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ (!empty($profile_view->photo))?asset('pos/image/profile_images/'.$profile_view->photo):asset('pos/image/no_image.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $profile_view->name }}</h3>

                <p class="text-muted text-center">Role : {{ $profile_view->user_type }}</p>

                 <table class="table table-reaponsive table-bordered">
                      <thead>
                          <tr>
                              <th>PHONE</th>
                              <th>ADDRESS</th>
                              <th>EMAIL</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>{{ $profile_view->phone }}</td>
                              <td>{{ $profile_view->address }}</td>
                              <td>{{ $profile_view->email }}</td>
                          </tr>
                      </tbody>
                 </table><br/>

                <a href="{{ route('profile.edit',$profile_view->id) }}" class="btn btn-primary btn-block ml-auto"><b><i class="fas fa-pen"></i></b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>











    

  </div>














@endsection