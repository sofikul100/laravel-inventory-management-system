@extends('software_master')
@section('title')
supplier Add Form  
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
                    <h3 class="pt-2 pl-2">Supplier Add </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                           <form action="{{ route('supplier.store') }}" method="POST">
                               @csrf
                               <div class="form-group">
                                   <label for="name">Company Name </label>
                                   <input style="border-radius:0px" type="text" name="name" id="name" class="form-control" placeholder="Company Name" value="{{ old('name') }}" required>
                                   @if($errors->has('name'))
                                       @foreach ($errors->get('name') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <div class="form-group">
                                   <label for="phone">Phone No </label>
                                   <input style="border-radius:0px" type="number" name="phone" id="phone" class="form-control" placeholder="Phone No" value="{{ old('phone') }}" required>
                                    @if($errors->has('phone'))
                                       @foreach ($errors->get('phone') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <div class="form-group">
                                   <label for="email">Email </label>
                                   <input style="border-radius:0px" type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                    @if($errors->has('email'))
                                       @foreach ($errors->get('email') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <div class="form-group">
                                   <label for="address">Address </label>
                                   <input style="border-radius:0px"  type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{ old('address') }}">
                                    @if($errors->has('address'))
                                       @foreach ($errors->get('address') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <input style="border-radius:0px"  type="submit" value="ADD" class="btn btn-info">
                           </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




















  </div>



@endsection