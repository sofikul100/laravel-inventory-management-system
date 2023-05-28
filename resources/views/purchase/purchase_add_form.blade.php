@extends('software_master')
@section('title')
Purchase Add Form  
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
                <div class="card">
                    <h3 class="pt-2 pl-2">Purchase Add </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                               <div class="form-group">
                                   <label for="date">Date  </label>
                                    <input type="date" id="date" class="form-control"  style="border-radius:0px">
                                    <span id="date_validate" style="color:red"></span>
                               </div>

                               <div class="form-group ">
                                   <label for="purchase_no">Purchase No  </label>
                                    <input type="text"  id="purchase_no" class="form-control" placeholder="Purchase No"  style="border-radius:0px">
                                    <span id="purchase_no_validate" style="color:red"></span>
                               </div>
                               <div class="form-group">
                                   <label for="unit">Supplier Name  </label>
                                   <select   id="supplier_id" class="form-control supplier_id" style="border-radius:0px">
                                       <option value="">Select Supplier </option>
                                    @foreach($supplier_view as $supplier)
                                       <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                    </select>
                                    <span id="supplier_id_validate" style="color:red"></span>
                               </div>
                               <div class="form-group">
                                   <label for="category">Category Name  </label>
                                   <select  id="category_id" class="form-control category_id" style="border-radius:0px">
                                        
                                   </select>
                                   <span id="category_id_validate" style="color:red"></span>
                               </div>
                               <div class="form-group ">
                                   <label>Product Name  </label>
                                   <select  id="product_id" class="form-control"  style="border-radius:0px">
                                       
                                   </select>
                                   <span id="product_id_validate" style="color:red"></span>
                               </div>
                              <a class="btn btn-info btn-sm addmoreevent" id="addmoreevent""><i class="fas fa-plus-circle"></i> Add More item </a>
                      </div>
                      </form>
                    </div>
                    <!---------heart section in this --------->
                    <div class="card-body">
                          <form action="{{ route('purchase.store') }}" method="POST" multiple>
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">CATEGORY</th>
                                    <th scope = "col">PRODUCT NAME </th>
                                    <th scope="col">PSC/KG/GRM</th>
                                    <th scope="col">UNIT PRICE</th>
                                    <th scope = "col">DESCRIPTION</th>
                                    <th scope="col">TOTAL PRICE </th>
                                    <th scope="col">ACTION </th>
                                  </tr>
                                </thead>
                                <tbody id="addrow" class="addrow">
                                      
                                 </tbody>
                                <tbody>         
                                     <tr>
                                        <td colspan="5"></td>
                                        <td><b>Total :</b> <input type="text" name="total_prices" id="total_prices" readonly class="form-control" value="" style="border-radius:0px;background-color:greenyellow"></td>
                                        <td></td>
                                     </tr>
                                </tbody>
                               
                            </table>
                             <input style="border-radius:0px;" type="submit" value="Purchases" class="btn btn-sm btn-info">
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!---------------------- handlebars js ----------------->

<script id="document_template" type="text/x-handlebars-template">

 <tr id="row_item_here" class="row_item_here">

    <input type="hidden" name="date[]" id="date" value="@{{ date }}">
    <input type="hidden" name="purchase_no[]" id="purchase_no" value="@{{ purchase_no }}">
    <input type="hidden" name="supplier_id[]" id="supplier_id" value="@{{ supplier_id }}">


    <td>
      <input type="hidden" name="category_id[]" id="category_id" value="@{{ category_id }}">
      @{{ category_name }}
    </td>


    <td>
      <input type="hidden" name="product_id[]" id="product_id" value="@{{ product_id }}">
      @{{ product_name }}
    </td>


    <td>
       <input type="number" name="psc_kg[]" id="psc_kg" value="1" min="1" class="form-control" style="border-radius:0px">

    </td>


    <td>
      <input type="number" name="single_product_price[]" id="single_product_price" value="" class="form-control" style="border-radius:0px">
    </td>


    <td>
      <input type="text" name="description[]" id="description" class="form-control" style="border-radius:0px">
    </td>


    <td>
        <input type="number" readonly name="total_price[]" id="total_price"  class="form-control total_price" style="border-radius:0px">
    </td>


    <td>
      <a id="remove" class="btn btn-sm btn-danger remove"><i class="fas fa-trash"></i></a>
    </td>


 </tr>
</script>
{{-- start javascript code  --}}
<script>
 $(document).ready(function(){
     $(document).on('click','#addmoreevent',function(){
          var date          = $('#date').val();
          var purchase_no   = $('#purchase_no').val();

          var supplier_id   = $('#supplier_id').val();

          var supplier_name = $('#supplier_id').find('option:selected').text();

          var category_id   = $('#category_id').val();

          var category_name = $('#category_id').find('option:selected').text();

          var product_id    = $('#product_id').val();

          var product_name  = $('#product_id').find('option:selected').text();

          if(date.length === 0) {
             document.getElementById('date_validate').innerText="Date Field Is Required !! ";
          }

          if(purchase_no.length === 0) {
             document.getElementById('purchase_no_validate').innerText="Purchase No Field Is Required !!  ";
          }

          if(supplier_id.length === 0) {
             document.getElementById('supplier_id_validate').innerText="Supplier_Name  Field Is Required !! ";
          }

          if(category_id.length === 0) {
             document.getElementById('category_id_validate').innerText="category_Name  Field Is Required !! ";
          }

           if(product_id.length === 0) {
             document.getElementById('product_id_validate').innerText="product_Name  Field Is Required !! ";
          }
          
          // text/x-handlebars-template er tr html gula dorte hoba 

          var source = $('#document_template').html();
          var template = Handlebars.compile(source);
          var data = {
                
                date         : date,
                purchase_no  : purchase_no,
                supplier_id  : supplier_id,
                supplier_name: supplier_name,
                category_id  : category_id,
                category_name: category_name,
                product_id   : product_id,
                product_name : product_name

          };
          //akane data variable ta template er batore duke jaba
          var html = template(data);
          $('#addrow').append(html);
          
     });
      //ai code gula row k delete korer jonno 
      $(document).on('click','#remove',function(event){

          $(this).closest('#row_item_here').remove();

          totalfunction();
      });
      // ai code ta psc_kg and  single_product_price gun korer jonno
      $(document).on('keyup click','#psc_kg , #single_product_price',function(){
         var psc_kg = $(this).closest("tr").find('input#psc_kg').val();

         var single_product_price = $(this).closest("tr").find('input#single_product_price').val();

         var total = psc_kg * single_product_price;

         $(this).closest('tr').find('input#total_price').val(total);

         totalfunction();
      });

      //total_prices  ber korer jonno 
      function totalfunction(){
        var sum = 0;
        $('#total_price').each(function(){
           var value = $(this).val();
           if(!isNaN(value) && value.length != 0){
             sum = sum + parseFloat(value);
           }
        });
        $('#total_prices').val(sum);
      }

 });

</script>

{{-- end javascript code  --}}

<!-------- code ajax ---------->
 <script>
  $(document).on('change','.supplier_id',function(){
 
      var supplier_id = $(this).val();
      $.ajax({
        url:"{{ route('get_category') }}",
        type:"GET",
        data:{supplier_id : supplier_id },
        success:function(data){
           var html = '<option value="">Select Category </option>';
           $.each(data,function(key,v){
               html += '<option value="'+v.category_id+'">'+v.category.name+'</option>';
           });
           $('.category_id').html(html);
        }
      });
  });    
 </script>
 <script>
      $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
              url:"{{ route('get_product') }}",
              type:"GET",
              data:{category_id : category_id },
              success:function(data){
                  var html = '<option value=""> Select Product </option>';
                  $.each(data,function(key,v){
                     html += '<option value="'+v.id+'">'+v.name+'</option>';
                  });
                $('#product_id').html(html);
              }
            });
         
      });
 </script>







  </div>

@endsection
