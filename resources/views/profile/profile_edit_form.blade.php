@extends('software_master')
@section('title')
profile Update 
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
                    <form action="{{ route('profile.update',$profile_edit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <div class="form-group">
                               <label for="name">Name </label>
                               <input style="border-radius:0px" type="text" name="name" id="name" value="{{ $profile_edit->name }}" required class="form-control">
                               @if($errors->has('name'))
                                  @foreach($errors->get('name') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                          <div class="form-group">
                               <label for="photo">Photo </label>
                               <input style="border-radius:0px" type="file" name="photo"  required class="form-control"><br/>
                              @if($errors->has('photo'))
                                  @foreach($errors->get('photo') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                               <img src="{{ (!empty($profile_edit->photo))?asset('pos/image/profile_images/'.$profile_edit->photo):asset('pos/image/no_image.png')}}" alt="" style="width:100px;height:80px;">
                           </div>
                           <div class="form-group">
                               <label for="phone">Phone </label>
                               <input style="border-radius:0px" type="text" name="phone" id="phone" value="{{ $profile_edit->phone }}" required class="form-control">
                                @if($errors->has('phone'))
                                  @foreach($errors->get('phone') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                            <div class="form-group">
                               <label for="address">Address </label>
                               <input style="border-radius:0px" type="text" name="address" id="address" value="{{ $profile_edit->address }}" required class="form-control">
                               @if($errors->has('address'))
                                  @foreach($errors->get('address') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <label for="email">Email  </label>
                               <input style="border-radius:0px" type="email" name="email" id="email" value="{{ $profile_edit->email }}" required class="form-control">
                               @if($errors->has('email'))
                                  @foreach($errors->get('email') as $error)
                                      <span style="color:red"> {{ $error }} </span>
                                  @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                               <input style="border-radius:0px" type="submit" class="btn btn-info" value="Update">
                           </div>
                       </form>
            </div>
            </div>
            </div>
            </div>
            </div>











    

  </div>














@endsection