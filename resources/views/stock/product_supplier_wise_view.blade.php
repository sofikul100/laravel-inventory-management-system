@extends('software_master')
@section('title')
Product/Supplier Wise Report
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
                    <h3 class="pt-2 pl-2">Product/Supplier Wise Report</h3>
                    <div class="card-body">
                       <div class="row">
                         <div class="inpu-group col-md-4 offset-md-2">
                           <label for="supplier_id">Supplier Wise Report</label>
                           <input type="radio" name="supplier_id" id="supplier_id" value="supplier_id">     
                        </div>
                        <div class="inpu-group col-md-4 offset-md-2">
                           <label for="product_id">Product Wise Report</label>
                           <input type="radio" name="supplier_id" id="product_id" value="product_id">     
                        </div>      
                      </div><br/><br/>
                       <div class="row">
                          <div class="col-md-5 offset-md-1">
                           <div id="show_supplier" style="display: none">
                        <form action="{{ route('supplier_wise_pdf') }}" method="POST">
                            @csrf
                          <select required name="supplier_id" id="supplier_show" class="form-control" style="border-radius:0px">
                              <option value="">Select Supplier </option>
                             @foreach ($supplier as $supplier_data)
                              <option value="{{ $supplier_data->id }}">{{ $supplier_data->name }}</option>    
                              @endforeach      
                         </select> <br/>
                          <input type="submit" name="search" id="search" class="form-control btn btn-sm btn-info" value="Search" style="border-radius:0px">   
                          </form>      
                         </div>     
                         </div> 
                         
                         
                         <div class="col-md-5 offset-md-1">
                        <div id="show_product" style="display: none">
                        <form action="{{ route('category_wise_pdf') }}" method="post">
                            @csrf
                          <select required name="product_id" id="product_id" class="form-control" style="border-radius:0px">
                              <option value="">Select Category </option>
                            @foreach($category as $category_data)  
                              <option value="{{ $category_data->id }}">{{ $category_data->name }}</option>
                              
                            @endforeach  
                         </select><br/>
                          <input type="submit" name="search" id="search" class="form-control btn btn-sm btn-info" value="Search" style="border-radius:0px">       
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
             
        $(document).on('click','#supplier_id',function(){
             var supplier_id = $(this).val();
             if(supplier_id == "supplier_id"){
                 $('#show_supplier').show();
                 $('#show_product').hide(); 
             }else{
                $('#show_supplier').hide(); 
             }
        });

            $(document).on('click','#product_id',function(){
             var product_id = $(this).val();
             if(product_id == "product_id"){
                 $('#show_product').show();
                 $('#show_supplier').hide();
             }
        });        
    });
    </script>
</div>
@endsection



