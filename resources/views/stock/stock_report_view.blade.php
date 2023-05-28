@extends('software_master')
@section('title')
stock report 
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
                    <h3 class="pt-2 pl-2">Stock Report</h3>
                    <a href="{{ route('stock.download') }}" target="_blank" class="btn btn-sm btn-info" style="width: 122px;float: right;margin-left: 13px;padding: 7px 0px;"> <i class="fas fa-download"></i> Download PDF</a>
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
                                  <th scope="col">IN STOCK</th>
                                  <th scope="col">OUT OF STOCK</th>
                                  <th scope="col">STOCK </th>
                                   </tr>
                                  </thead>
                                <tbody>
                      @foreach($products as $key=>$product_data)
                           @php
                               $in_quantity = App\purchase::where('product_id',$product_data->id)->where('status',1)->sum('buying_quantity');
                           @endphp
                           @php
                               $out_of_stock = App\invoice_deteils::where('product_id',$product_data->id)->where('status',1)->sum('quantity');
                           @endphp       
                         <tr>
                         <th scope="row">{{ $key + 1 }}</th>
                          <td>{{ $product_data->name }}</td>
                         <td>{{ $product_data['supplier']['name'] }}</td>
                         <td>{{ $product_data['unit']['name']}}</td>
                         <td>{{ $product_data['category']['name'] }}</td>
                         <td>{{ $in_quantity }}</td>
                         <td>{{ $out_of_stock }}</td>
                         <td>{{ $product_data->quantity }}</td>
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

@endsection








