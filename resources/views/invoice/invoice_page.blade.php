@extends('software_master')
@section('title')
approval page 
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
                <div class="card" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
                    <h3 class="pt-2 pl-2">Customer Infomation</h3>
                       {{-- access model --}}
                        @php
                               $payment = App\payment::where('invoice_id',$invoice_approve_click->id)->first();
                                     
                        @endphp

                      <div class="card-body">
                         <table class="table table-responsive" style="">
                              <tbody>
                                  <tr>
                                      <td><strong>NAME :- </strong> {{ $payment['customer']['name'] }}</td>
                                      <td><strong>PHONE :- </strong> {{ $payment['customer']['phone'] }}</td>
                                      <td><strong>EMAIL :- </strong> {{ $payment['customer']['email'] }}</td>
                                      <td><strong>ADDRESS :- </strong> {{ $payment['customer']['address'] }}</td>
                                  </tr>
                              </tbody>
                              <tbody>
                                  <tr>
                                      <td colspan="12"><strong>DESCRIPTION :- </strong>{{ $invoice_approve_click->description }}</td>
                                  </tr>
                              </tbody>
                         </table><BR/>
                          {{-- access payment_deteils model --}}
                           @php
                               $invoice_deteils = App\invoice_deteils::where('invoice_id',$invoice_approve_click->id)->get();
                               //@dd($invoice_deteils->id)
                           @endphp
                         <form action="{{ route('approve.store',$invoice_approve_click->id) }}" method="POST">
                             
                           @csrf
                         <div class="table-responsive">
                              <table class="table table-bordered text-center" id="example1">
                                   <thead>
                                       <tr>
                                           <th scope="col">SL NO. </th>
                                           <th scope="col">CATEGORY NAME </th>
                                           <th scope="col">PRODUCT NAME </th>
                                           <th scope="col" style="background:greenyellow">CURRENT STOCK</th>
                                           <th scope="col">QUANTITY</th>
                                           <th scope="col">UNIT PRICE</th>
                                           <th scope="col">TOTAL PRICE </th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                      {{-- sub total --}}
                                      @php
                                          $sub = "0";
                                       @endphp
                                    @foreach ($invoice_deteils as $key => $invoice_data)
                                          <input style="display:none" type="text" name="category_id[]" id="category" value="{{ $invoice_data->category_id }}">
                                          <input  style="display:none" type="text" name="product_id[]" id="product" value="{{ $invoice_data->product_id }}">
                                          <input style="display:none" type="text" name="quantity[{{ $invoice_data->id }}]" value="{{ $invoice_data->quantity }}">
                                       <tr>
                                           <th scope="row"> {{ $key + 1 }}</th>
                                           <td>{{ $invoice_data['category']['name'] }}</td>
                                           <td>{{ $invoice_data['product']['name'] }}</td>
                                           <td style="background:greenyellow">{{ $invoice_data['product']['quantity'] }}</td>
                                           <td>{{ $invoice_data->quantity }}</td>
                                           <td>{{ $invoice_data->single_product_price }}TK</td>
                                           <td>{{ $invoice_data->total }}TK</td>
                                           @php
                                           $sub += $invoice_data->total 
                                           @endphp
                                       </tr>
                                       
                                    @endforeach   
                                   </tbody>
                                   <tbody>
                                        <tr>
                                          <td colspan="6" class="text-right"><strong>SUB TOTAL</strong></td>
                                          <td>{{ $sub }}TK</td>
                                        </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>PAID AMOUNT</strong></td>
                                           <td>{{ $payment->paid_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>DUE AMOUNT</strong></td>
                                           <td>{{ $payment->due_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>DISCOUNT</strong></td>
                                           <td>{{ $payment->discount_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>GRAND TOTAL</strong></td>
                                           <td style="background:greenyellow">{{ $payment->total_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                    
                              </table>
                              <input style="border-radius: 0px;" type="submit" value="Approve & store " class="btn btn-sm btn-info">
                         </div>
                         
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection