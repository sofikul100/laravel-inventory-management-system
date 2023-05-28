@extends('software_master')
@section('title')
invoice approve page 
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
                <div class="card" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);">
                    <h3 class="pt-2 pl-2">Invoice Pending List </h3>
                      <div class="card-body">
<div class="table-responsive">
  <table class="table table-bordered table-striped" id="example1">
    <thead>
      <tr>
        <th scope="col">SL NO </th>
        <th scope="col">CUSTOMER NAME  </th>
        <th scope="col">INVOICE NO  </th>
        <th scope="col">DESCRIPTION  </th>
        <th scope="col">TOTAL AMOUNT </th>
        <th scope="col">STATUS</th>
        <th scope="col">ACTION</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($invoice_approve as $key => $invoice_approve_data) 
      <tr>
        <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $invoice_approve_data['payment']['customer']['name']}}</td>
                <td>{{ $invoice_approve_data->invoice_no }}</td>
                <td>{{ $invoice_approve_data->description }}</td>
                <td>
                    {{ $invoice_approve_data['payment']['total_amount']}} TK
                </td>
                <td>
                    @if($invoice_approve_data->status == "0")
                      <button class="btn btn-danger btn-sm">Pending</button>
                    @endif
                </td>
                <td>
                    <a href="{{ route('invoice.approve_click',$invoice_approve_data->id) }}" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
                    <a href="{{ route('invoice.delete',$invoice_approve_data->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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