<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Paid List Pdf </title>
</head>
<body>
    
  <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h2 style="text-align:center">AMER DOKAN</h2>
                    <h3 class="pt-2 pl-2" style="text-align:center">Customer Paid List</h3>
                    <P style="text-align:center"> <b>Phone : </b> +8801833344149</P> 
                      <div class="card-body">
                         <table>
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
                              <table  border="1">
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
                                         <tr>
                                             <td colspan="7" style="text-align:center"><b>Due Paid Summary</b></td>
                                         </tr>
                                   </tbody>
                                   @php
                                       $payment_deteils = App\payment_deteils::where('invoice_id',$payment->invoice_id)->get();
                                   @endphp
                                   <tbody>
                                    @foreach ($payment_deteils as $key => $dtl)   
                                       <tr>
                                           <td colspan="1">{{ $key + 1 }}</td>
                                           <td colspan="3" style="text-align:center">Date : {{ date('d-m-Y',strtotime($dtl->date)) }}</td>
                                           <td colspan="3" style="text-align:center"><b>Amount: </b> {{ $dtl->current_paid_amount }}</td>
                                       </tr>
                                    @endforeach
                                   </tbody>
                              </table>
                              <p>Seller Signiture</p>
                         </div><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>