<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>stock download </title>
</head>
<body>
       <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                     <h2 style="text-align:center">AMER DOKAN </h2>
                    <h3 class="pt-2 pl-2" style="text-align:center">stock download list </h3>
                    <P style="text-align:center">Phone : +8801833344149</P>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table border="1" style="margin-left:50px;">
                              <thead>
                              <tr>
                               <th scope="col">SL NO </th>
                                <th scope="col">PRODUCT NAME</th>
                                 <th scope="col">COMPANY NAME </th>
                                  <th scope="col">CATEGORY NAME </th>
                                  <th scope="col">IN STOCK</th>
                                  <th scope="col">OUT OF STOCK</th>
                                  <th scope="col">Stock </th>
                                  <th scope="col">UNIT</th>
                                   </tr>
                                  </thead>
                                <tbody>
                      @foreach($products as $key=>$product_data)
                      
                         @php
                                  $supplier = App\supplier::where('id',$product_data->supplier_id)->first();
                         @endphp
                         @php
                                  $category = App\category::where('id',$product_data->category_id)->first();
                         @endphp
                         @php
                                  $unit = App\unit::where('id',$product_data->unit_id)->first();
                         @endphp
                         @php
                               $in_quantity = App\purchase::where('product_id',$product_data->id)->where('status',1)->sum('buying_quantity');
                           @endphp
                           @php
                               $out_of_stock = App\invoice_deteils::where('product_id',$product_data->id)->where('status',1)->sum('quantity');
                           @endphp  
                          <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $product_data->name }}</td>
                          <td>{{ $supplier->name }}</td>
                          <td>{{ $category->name }}</td>
                          <td>{{ $in_quantity }}</td>
                          <td>{{ $out_of_stock }}</td>
                          <td>{{ $product_data->quantity }}</td>
                          <td>{{ $unit->name }}</td>
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
</body>
</html>