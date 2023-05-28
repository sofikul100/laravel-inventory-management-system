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
                          <p>Mobile : 01833344149</p>
                      <p><strong>Daily Invoice Date : ({{ date('d-m-Y',strtotime($start_date)) }} <-> {{ date('d-m-Y',strtotime($end_date)) }})<strong></p>
                      </div>

                      <div class="card-body">
                            <table border="1" style="margin-left:100px;">
                                 <thead>
                                     <tr>
                                         <th>Sl No</th>
                                         <th>Customer Name</th>
                                         <th>Invoice No</th>
                                         <th>Date</th>
                                         <th>Description</th>
                                         <th>Amount</th>
                                         <th>Grand Total</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @php
                                         $sub = "0";
                                     @endphp
                                @foreach($alldata as $key => $data)
                                     <tr>
                                         <td>{{ $key + 1 }}</td>
                                         <td>{{ $data['payment']['customer']['name'] }}</td>
                                         <td>{{ $data->invoice_no }}</td>
                                         <td>{{ date('Y,m,d',strtotime($data->date)) }}</td>
                                         <td>{{ $data->description }}</td>
                                         <td>{{ $data['payment']['total_amount'] }} TK</td>
                                      @php
                                          $subs = $sub + $data['payment']['total_amount']; 
                                      @endphp
                                         <td>{{ $subs }} TK</td>

                                     </tr>
                                @endforeach
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
</body>
</html>