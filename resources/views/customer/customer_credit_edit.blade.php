@extends('software_master')
@section('title')
Customer Credit Edit
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
                                      <td colspan="12"><strong></strong></td>
                                  </tr>
                              </tbody>
                         </table><BR/>
                         @php
                             $invoice_deteils = App\invoice_deteils::where('invoice_id',$payment->invoice_id)->get();
                         @endphp
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
                                       @php
                                           $sub = "0";
                                       @endphp
                                @foreach($invoice_deteils as $key => $data)                 
                                       <tr>
                                           <th scope="row">{{ $key + 1 }}</th>
                                           <td>{{ $data['category']['name'] }}</td>
                                           <td>{{ $data['product']['name'] }}</td>
                                           <td style="background:greenyellow">{{ $data['product']['quantity'] }}</td>
                                           <td>{{ $data->quantity }}</td>
                                           <td>{{ $data->single_product_price }} TK</td>
                                           <td>{{ $data->total }} TK</td>
                                          @php
                                              $sub += $data->total;
                                          @endphp
                                       </tr>
                                     @endforeach 
                                   </tbody>

                                   <tbody>
                                        <tr>
                                          <td colspan="6" class="text-right"><strong>SUB TOTAL</strong></td>
                                          <td>{{  $sub }} TK</td>
                                        </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>PAID AMOUNT</strong></td>
                                           <td>{{ $payment->paid_amount }} TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>DUE AMOUNT</strong></td>
                                           <td>{{ $payment->due_amount }} TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>DISCOUNT</strong></td>
                                           <td>{{ $payment->discount_amount }} TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right"><strong>GRAND TOTAL</strong></td>
                                           <td style="background:greenyellow">{{ $payment->total_amount }} TK</td>
                                         </tr>
                                   </tbody>
                              </table>
                              
                         </div><br/>
                        <form action="{{ route('credit.customer.due.amount',$payment->invoice_id) }}" method="POST">
                           @csrf
                          <input type="hidden" name="full_due_amount" value="{{ $payment->due_amount }}">
                          <div class="row">
                              <div class="input-group col-md-5">
                                  <select required name="paid_status" id="paid_status" class="form-control" style="border-radius:0px;">
                                      <option value="">Select paid status </option>
                                      <option value="full_due">Full Due</option>
                                      <option value="partial_paid">Partial Paid</option>
                                  </select>
                              </div>
                              <div class="input-group col-md-5" id="show_input" style="display:none">
                                  <input type="number" required name="paid_amount" id="paid_amount" class="form-control" style="border-radius:0px" placeholder="amount">
                              </div>
                              <br/><br/>


                              <div class="input-group col-md-5">
                                  <input type="date" required name="date" id="date" class="form-control" style="border-radius:0px">
                              </div><br/>
                              <div class="input-group col-md-3">
                                  <input style="border-radius:0px;" type="submit" value="Paid & Store" class="btn btn-sm btn-info">
                              </div>
                          </div>
                         
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  <script>
      $(document).ready(function(){
         $(document).on('click','#paid_status',function(){
             var paid_status = $(this).val();

             if(paid_status == "partial_paid"){
                 $('#show_input').show();
             }else{
               $('#show_input').hide()
             }
         });
      }); 
  </script>
  </div>
@endsection