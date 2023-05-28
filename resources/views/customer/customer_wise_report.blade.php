@extends('software_master')
@section('title')
Customer Wise Report 
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
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <h3 class="pt-2 pl-2">Customer Wise Report </h3>
                    <div class="card-body">
                       <div class="row">
                         <div class="inpu-group col-md-4 offset-md-2">
                           <label for="credit_customer">Credit Customer Report </label>
                           <input type="radio" name="supplier_id" id="credit_customer" value="credit_customer">     
                        </div>
                        <div class="inpu-group col-md-4 offset-md-2">
                           <label for="paid_customer">Paid Customer Report</label>
                           <input type="radio" name="supplier_id" id="paid_customer" value="paid_customer">     
                        </div>      
                      </div><br/><br/>
                       <div class="row">
                          <div class="col-md-5 offset-md-1">
                           <div id="credit_customer_show" style="display: none">
                        <form action="{{ route('credit.customer') }}" method="POST">
                            @csrf
                          <select required name="credit_customer"  class="form-control" style="border-radius:0px">
                              <option value="">Select Customer  </option>
                            @foreach($customer as $customer_data)  
                              <option value="{{ $customer_data->id }}">{{ $customer_data->name }}(phone: {{ $customer_data->phone }})</option>               
                            @endforeach  
                         </select> <br/>
                          <input type="submit" name="search" id="search" class="form-control btn btn-sm btn-info" value="Search" style="border-radius:0px">   
                          </form>      
                         </div>     
                         </div> 
                         
                         
                         <div class="col-md-5 offset-md-1">
                        <div id="paid_customer_show" style="display: none">
                        <form action="{{ route('paid.customer') }}" method="post">
                            @csrf
                          <select required name="paid_customer" id="paid_customer" class="form-control" style="border-radius:0px">
                              <option value="">Select Customer </option>
                            @foreach($customer as $customer_data)   
                              <option value="{{ $customer_data->id }}">{{ $customer_data->name }}(phone : {{ $customer_data->phone }})</option> 
                            @endforeach  
                         </select><br/>
                          <input type="submit" target="_blank" name="search" id="search" class="form-control btn btn-sm btn-info" value="Search" style="border-radius:0px">       
                          </form>      
                         </div>     
                         </div> 
                       </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
  $(document).ready(function () {
             
        $(document).on('click','#credit_customer',function(){
             var credit_customer = $(this).val();
             if(credit_customer == "credit_customer"){
                 $('#credit_customer_show').show();
                 $('#paid_customer_show').hide(); 
             }else{
                $('#credit_customer_show').hide(); 
             }
        });

            $(document).on('click','#paid_customer',function(){
             var paid_customer = $(this).val();
             if(paid_customer == "paid_customer"){
                 $('#paid_customer_show').show();
                 $('#credit_customer_show').hide();
             }
        });        
    });
    </script>
</div>
@endsection



