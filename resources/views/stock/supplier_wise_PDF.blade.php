<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supplier Wise Pdf download</title>
</head>
<body>
           <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                     <h2 style="text-align:center">AMER DOKAN </h2>
                    <h3 class="pt-2 pl-2" style="text-align:center">Supplier Wise Stock Report</h3>
                    <P style="text-align:center">Phone : +8801833344149</P>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                           <table border="1" style="margin-left:70px;">
                              <thead>
                              <tr>
                               <th scope="col">SL NO </th>
                                <th scope="col">Supplier Name </th>
                                 <th scope="col">PRODUCT NAME </th>
                                  <th scope="col">CATEGORY NAME </th>
                                  <th scope="col">IN STOCK</th>
                                  <th scope="col">OUT OF STOCK</th>
                                  <th scope="col">Stock </th>
                                  <th scope="col">UNIT</th>
                                   </tr>
                                  </thead>
                        <tbody>
                    @foreach($supplier as $key => $supplier_wise_data)
                            @php
                               $in_quantity = App\purchase::where('product_id',$supplier_wise_data->id)->where('status',1)->sum('buying_quantity');
                           @endphp
                           @php
                               $out_of_stock = App\invoice_deteils::where('product_id',$supplier_wise_data->id)->where('status',1)->sum('quantity');
                           @endphp         
                          <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $supplier_wise_data['supplier']['name'] }}</td>
                          <td>{{ $supplier_wise_data->name}}</td>
                          <td>{{ $supplier_wise_data['category']['name'] }}</td>
                          <td>{{  $in_quantity  }}</td>
                          <td>{{  $out_of_stock  }}</td>
                          <td>{{ $supplier_wise_data->quantity }}</td>
                          <td>{{ $supplier_wise_data['unit']['name'] }}</td>
                           </tr>
                      @endforeach
                     </tbody>
                      </table><br/>
                      <p style="margin-left:15px;">Owner Signiture</p>
                       <hr/>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>