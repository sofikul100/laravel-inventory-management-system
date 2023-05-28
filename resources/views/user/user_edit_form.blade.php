@extends('software_master')
@section('title')
user Edit form 
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
                    <h3 class="pt-2 pl-2">User Update </h3>
                    <div class="card-body">
                       <form action="{{ route('user.update',$user_edit->id) }}" method="POST">
                        @csrf
                           <div class="form-group">
                               <label for="name">Name </label>
                               <input style="border-radius:0px" type="text" name="name" id="name" value="{{ $user_edit->name }}" required class="form-control">
                               @if($errors->has('name'))
                                  @foreach($errors->get('name') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <label for="user_type">User Type </label>
                               <select name="user_type" id="user_type" class="form-control" style="border-radius:0px;" required>
                                @foreach ($user_type as $type)  
                                    <option value="{{ $type->role}}" 
                                    @if($type->role == $user_edit->user_type)
                                        selected
                                    @endif
                                    >{{ $type->role }}</option>
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
                               <input style="border-radius:0px" type="email" name="email" id="email" value="{{ $user_edit->email }}" required class="form-control">
                              @if($errors->has('email'))
                                  @foreach($errors->get('email') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
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