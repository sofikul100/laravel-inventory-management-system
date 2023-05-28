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
                <div class="card">
                      <div id="top_information" style="text-align:center">
                         <h2>AMER DOKAN LTD </h2>
                          <h3 class="">Parchase Report Daily</h3>
                          <p>Mobile : 01833344149</p>
                      <p><strong> Parchase Date : ({{ date('d-m-Y',strtotime($start_date)) }} <-> {{ date('d-m-Y',strtotime($end_date)) }})<strong></p>
                      </div>

                      <div class="card-body">
                            <table border="1" style="margin-left:70px;">
                                 <thead>
                                     <tr>
                                         <th>Sl No</th>
                                         <th>Invoice no</th>
                                         <th>Description</th>
                                         <th>Buying Quantity</th>
                                         <th>Unit Price</th>
                                         <th>Total Price</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @php
                                         $subs = "0";
                                     @endphp
                                @foreach($alldata as $key => $data)
                                     <tr>
                                         <td>{{ $key + 1 }}</td>
                                         <td>#{{ $data->purchase_no }}</td>
                                         <td>{{ $data->description }}</td>
                                         <td>{{ $data->buying_quantity }}</td>
                                         <td>{{ $data->unit_price }}TK</td>
                                         <td>{{ $data->buying_price }}TK</td>
                                      @php
                                          $subs = $subs + $data->buying_price; 
                                      @endphp
                                     </tr>
                                @endforeach
                                 </tbody>
                                 <tbody>
                                     <tr>
                                         <td style="padding:15px 25px;"><b>GRAND TOTAL</b></td>
                                          <td style="background:greenyellow">{{ $subs }} TK</td>
                                     </tr>
                                 </tbody>
                            </table><br/><br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:15px;"><b>Ownner Signiture</b></span>
                           
                              
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>