@extends('software_master')
@section('title')
profile password change 
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
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                           <div class="form-group">
                               <label for="current_password">Current Password  </label>
                               <input style="border-radius:0px" type="password" name="current_password" id="current_password" placeholder="current password" required class="form-control">
                               @if($errors->has('current_password'))
                                    @foreach($errors->get('current_password') as $error)
                                        <span style="color:red">{{ $error }}</span>
                                    @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <label for="new_password">New Password  </label>
                               <input style="border-radius:0px" type="password" name="new_password" id="new_password" placeholder="new password" required class="form-control">
                               @if($errors->has('new_password'))
                                    @foreach($errors->get('new_password') as $error)
                                        <span style="color:red">{{ $error }}</span>
                                    @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <label for="confirm_password">Confirm Password  </label>
                               <input style="border-radius:0px" type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" required class="form-control">
                               @if($errors->has('confirm_password'))
                                    @foreach($errors->get('confirm_password') as $error)
                                        <span style="color:red">{{ $error }}</span>
                                    @endforeach
                               @endif
                           </div>
                           <input style="border-radius:0px"  type="submit" value="Change" class="btn btn-info">
                       </form>
            </div>
            </div>
            </div>
            </div>
            </div>











    

  </div>














@endsection