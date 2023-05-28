<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);border-radius: 0px;">
                      <div id="top_information" style="text-align:center">
                         <h2>AMER DOKAN LTD </h2>
                          <h3 class="">Customer Infomation</h3>
                           <p><strong>#{{ $invoice_approve_click->invoice_no }} Date</strong> : {{ date('d,m,Y',strtotime($invoice_approve_click->date)) }}</p>
                      </div>
                       {{-- access model --}}
                        @php
                               $payment = App\payment::where('invoice_id',$invoice_approve_click->id)->first();
                                     
                        @endphp

                      <div class="card-body">
                            <p><strong>NAME : </strong>{{ $payment['customer']['name'] }}</p>
                            <p><strong>PHONE : </strong>{{ $payment['customer']['phone'] }}</p>
                            <p><strong>EMAIL : </strong>{{ $payment['customer']['email'] }}</p>
                            <p><strong>ADDRESS : </strong>{{ $payment['customer']['address']}} </p>
                            <p><strong>DESCRIPTION : </strong>{{ $invoice_approve_click->description }}</p>
                          {{-- access payment_deteils model --}}
                           @php
                               $invoice_deteils = App\invoice_deteils::where('invoice_id',$invoice_approve_click->id)->get();
                               //@dd($invoice_deteils->id)
                           @endphp
                         <div class="table-responsive">
                              <table border="1" style="padding:40px;">
                                   <thead>
                                       <tr style="padding:10px;">
                                           <th scope="col" style="padding:20px;background:#B6E2B6">SL NO. </th>
                                           <th scope="col" style="padding:20px;background:#B6E2B6">CATEGORY NAME </th>
                                           <th scope="col" style="padding:20px;background:#B6E2B6">PRODUCT NAME </th>
                                           <th scope="col" style="background:rgb(138, 209, 38)" style="padding:20px;">CURRENT STOCK</th>
                                           <th scope="col" style="padding:20px;background:#B6E2B6">QUANTITY</th>
                                           <th scope="col" style="padding:20px;background:#B6E2B6">UNIT PRICE</th>
                                           <th scope="col" style="padding:20px;background:#B6E2B6">TOTAL PRICE </th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                      {{-- sub total --}}
                                      @php
                                          $sub = "0";
                                       @endphp
                                    @foreach ($invoice_deteils as $key => $invoice_data)
                                       <tr>
                                           <th scope="row" style="padding:20px;"> {{ $key + 1 }}</th>
                                           <td style="padding:20px;"> {{ $invoice_data['category']['name'] }}</td>
                                           <td style="padding:20px;">{{ $invoice_data['product']['name'] }}</td>
                                           <td style="background:greenyellow">{{ $invoice_data['product']['quantity'] }}</td>
                                           <td style="padding:20px;">{{ $invoice_data->quantity }}</td>
                                           <td style="padding:20px;">{{ $invoice_data->single_product_price }}TK</td>
                                           <td style="padding:20px;"> {{ $invoice_data->total }}TK</td>
                                           @php
                                           $sub += $invoice_data->total 
                                           @endphp
                                       </tr>
                                       
                                    @endforeach   
                                   </tbody>
                                   <tbody>
                                        <tr>
                                          <td colspan="6" class="text-right" style="padding:20px;"><strong>SUB TOTAL</strong></td>
                                          <td style="padding:20px;">{{ $sub }}TK</td>
                                        </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right" style="padding:20px;"><strong>PAID AMOUNT</strong></td>
                                           <td style="padding:20px;">{{ $payment->paid_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right" style="padding:20px;"><strong>DUE AMOUNT</strong></td>
                                           <td style="padding:20px;">{{ $payment->due_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right" style="padding:20px;"><strong>DISCOUNT</strong></td>
                                           <td style="padding:20px;">{{ $payment->discount_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                   <tbody>
                                         <tr>
                                           <td colspan="6" class="text-right" style="padding:20px;"><strong>GRAND TOTAL</strong></td>
                                           <td style="background:#ADFF2F" style="padding:20px;">{{ $payment->total_amount }}TK</td>
                                         </tr>
                                   </tbody>
                                    
                              </table><br/><br/>
                              <span>Customer Signiture</span>
                               &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                              <span>Seller Signiture</span>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>