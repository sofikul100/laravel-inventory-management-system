@extends('software_master')
@section('title')
user add form 
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
                    <h3 class="pt-2 pl-2">User Add </h3>
                    <div class="card-body">
                       <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                           <div class="form-group">
                               <label for="name">Name </label>
                               <input style="border-radius:0px" type="text" name="name" id="name" placeholder="inter name" required class="form-control">
                              @if($errors->has('name'))
                                  @foreach($errors->get('name') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <label for="user_type">User Type </label>
                               <select name="user_type" id="user_type" class="form-control" style="border-radius:0px;" required>
                                    <option value="">Select User Type </option>
                                @foreach($user_type as $user_type_data)    
                                    <option value="{{ $user_type_data->role }}">{{ $user_type_data->role }}</option>
                                @endforeach    
                               </select>
                              @if($errors->has('user_type'))
                                  @foreach($errors->get('user_type') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <label for="email">Email  </label>
                               <input style="border-radius:0px" type="email" name="email" id="email" placeholder="inter email" required class="form-control">
                              @if($errors->has('email'))
                                  @foreach($errors->get('email') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <label for="password">Password  </label>
                               <input style="border-radius:0px" type="password" name="password" id="password" placeholder="inter password" required class="form-control">
                               @if($errors->has('password'))
                                  @foreach($errors->get('password') as $error)
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