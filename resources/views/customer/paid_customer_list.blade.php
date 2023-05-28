@extends('software_master')
@section('title')
Paid customer List 
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
                    <h3 class="pt-2 pl-2 text-right mr-1">Paid Customer List </h3>
                     
                    <div class="card-body">
                    <a href="{{ route('credit.customer.pdf') }}" style="border-radius:0px;position: absolute;top: 14px;" class="btn btn-sm btn-info"><i class="fas fa-download"> Download pdf</i></a>
                        <div class="table-responsive">
                           <table class="table table-bordered" id="example1">
                              <thead>
                              <tr>
                               <th scope="col">SL NO </th>
                                <th scope="col">Customer Name</th>
                                 <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Invoice No</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Paid Amount</th>
                                  <th scope="col">Action </th>
                                   </tr>
                                  </thead>
                                <tbody>
                                    @php
                                        $total_due = "0";
                                    @endphp
                    @foreach($payment as $key => $data)                          
                              <tr>
                         <th scope="row">{{ $key + 1 }}</th>
                          <td>{{ $data['customer']['name'] }}</td>
                         <td>{{ $data['customer']['email'] }}</td>
                         <td>{{ $data['customer']['phone'] }}</td>
                         <td>{{ $data['customer']['address'] }}</td>
                         <td>#{{ $data['invoice']['invoice_no'] }}</td>
                         <td>{{ date('d-m-Y',strtotime($data['invoice']['date'])) }}</td>
                         <td>{{ $data->paid_amount }} TK</td>
                         <td>
                           <a href="{{ route('customer.paid.list.pdf',$data->invoice_id) }}" target="_blank" title="Deteils" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i></a>
                         </td>
                           </tr>
                           @php
                               $total_due += $data->paid_amount;
                           @endphp
                    @endforeach       
                     </tbody>
                      <tbody>
                          <tr>
                              <td colspan="6"></td>
                              <td style="background:greenyellow"><b>Grand Due Amount</b></td>
                              <td style="background:greenyellow"><b>{{  $total_due }} TK</b></td>
                          </tr>
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