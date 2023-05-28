@extends('software_master')
@section('title')
product  view page 
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
                    <h3 class="pt-2 pl-2">Product  View </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="table" id="example1">
                              <thead>
                              <tr>
                               <th scope="col">SL NO </th>
                                <th scope="col">PRODUCT NAME</th>
                                 <th scope="col">COMPANY NAME </th>
                                  <th scope="col">UNIT</th>
                                  <th scope="col">CATEGORY NAME </th>
                                  <th scope="col">ACTION </th>
                                   </tr>
                                  </thead>
                                <tbody>
                      @foreach($product_view as $key=>$product_data)            
                              <tr>
                         <th scope="row">{{ $key + 1 }}</th>
                          <td>{{ $product_data->name }}</td>
                         <td>{{ $product_data['supplier']['name'] }}</td>
                         <td>{{ $product_data['unit']['name']}}</td>
                         <td>{{ $product_data['category']['name'] }}</td>
                            {{-- this code is spacial  --}}
                         @php
                               $supplier_delete_hide = App\purchase::where('product_id',$product_data->id)->count();
                               //@dd($supplier_delete_hide);
                         
                         @endphp
                         <td>
                           <a href="{{ route('product.edit',$product_data->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                           @if($supplier_delete_hide < 1)
                           <a href="{{ route('product.delete',$product_data->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                           @endif
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