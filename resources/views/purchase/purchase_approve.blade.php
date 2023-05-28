@extends('software_master')
@section('title')
purchase  Approve page 
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
            <div class="col-md-12">
                <div class="card">
                    <h3 class="pt-2 pl-2">Purchase  View </h3>
                      <div class="card-body">
                           <table class="table table-bordered table-responsive" id="example1">
                              <thead>
                              <tr>
                                <th>SL NO </th>
                                <th>DATE </th>
                                <th>PURCHASE_NO </th>
                                <th>SUPPLIER_NAME  </th>
                                <th>CATEGORY_NAME  </th>
                                <th>PRODUCT_NAME  </th>
                                <th>DESCRIPTION  </th>
                                <th>QUANTITY  </th>
                                <th>UNIT_PRICE   </th>
                                <th>TOTAL_PRICE  </th>
                                <th>STATUS  </th>
                                <th>APPROVE </th>
                                </tr>
                               </thead>
                                <tbody> 
                      @foreach ($purchase_view as $key=>$purchase_data)      
                      <tr>                    
                        <td>{{ $key + 1 }}</td>
                        <td>{{ date('d-m-Y',strtotime($purchase_data->date)) }}</td>
                        <td>{{ $purchase_data->purchase_no }}</td>
                        <td>{{ $purchase_data['supplier']['name']}}</td>
                        <td>{{ $purchase_data['category']['name'] }}</td>
                        <td>{{ $purchase_data['product']['name'] }}</td>
                        <td>{{ $purchase_data->description }}</td>
                        {{-- this work is very hard  --}}
                        <td>
                          {{ $purchase_data->buying_quantity }}
                          {{ $purchase_data['product']['unit']['name'] }}
                        </td>
                        {{-- this work is very hard  --}}
                        <td> -> {{ $purchase_data->unit_price }} taka </td>
                        <td> ->  {{ $purchase_data->buying_price }} taka</td>
                        <td>
                            @if($purchase_data->status == "0")
                              <span style="background:#D9534F;padding:5px;color:white;border-radius:3px;">Pending</span>
                            @elseif($purchase_data->status == "1")
                              <span style="background:#5CB85C;padding:5px;color:white;border-radius:3px;">Approve</span>
                            @endif
                        </td>
                         <td>
                           <a href="{{ route('purchase.approved_icon',$purchase_data->id) }}" class="btn btn-success btn-sm" id="approve"><i class="far fa-check-circle"></i></a>
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
@endsection