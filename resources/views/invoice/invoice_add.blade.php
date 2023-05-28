@extends('software_master')
@section('title')
    Invoice Add Form
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
                        <h3 class="pt-2 pl-2">Invoice Add </h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group">
                                    <label for="date">Invoice No </label>
                                    <input type="text" readonly id="invoice_no" class="form-control invoice_no"
                                        value="{{ $invoice_no }}" style="border-radius:0px" name="invoice_no">
                                </div>

                                <div class="form-group ">
                                    <label for="date">Date </label>
                                    <input type="date" id="date" class="form-control date" placeholder="date"
                                        style="border-radius:0px">
                                    <span id="date_validate" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="unit">Category Name </label>
                                    <select id="category_id" class="form-control category_id" style="border-radius:0px">
                                        <option value="">Select Category Name </option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="category_id_validate" style="color:red"></span>
                                </div>
                                <div class="form-group ">
                                    <label>Product Name </label>
                                    <select id="product_id" class="form-control product_id" style="border-radius:0px">
                                        <option value="">Select Product Name </option>
                                    </select>
                                    <span id="product_id_validate" style="color:red"></span>
                                </div>
                                <div class="form-group ">
                                    <label>Stock PSC/KG : </label>
                                    <input type="text" name="stock" id="stock" value="" readonly
                                        style="background:greenyellow;border-radius:0px;" class="form-control-sm">
                                    <span id="product_id_validate" style="color:red"></span>
                                </div>
                                <a class="btn btn-info btn-sm addmoreevent" id="addmoreevent"" style="
                                    border-radius:0px;"><i class="fas fa-plus-circle"></i> Add More item </a>
                            </div>
                        </div>
                        <!---------heart section in this --------->
                        <div class="card-body">
                            <form action="{{ route('invoice.store') }}" method="POST">
                                @csrf
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">CATEGORY</th>
                                            <th scope="col">PRODUCT NAME </th>
                                            <th scope="col">PSC/KG/GRM</th>
                                            <th scope="col">UNIT PRICE</th>
                                            <th scope="col">TOTAL PRICE </th>
                                            <th scope="col">ACTION </th>
                                        </tr>
                                    </thead>
                                    <tbody id="addrow" class="addrow">

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="4">Discount </td>
                                            <td><input type="number" name="discount" id="discount" class="form-control"
                                                    placeholder="enter discount amount" style="border-radius:0px;"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td><b>Total :</b> <input type="text" name="total_prices" id="total_prices"
                                                    readonly class="form-control total_prices" value=""
                                                    style="border-radius:0px;background-color:greenyellow"></td>
                                            <td></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Description </label>
                                        <textarea style="border-radius:0px" name="description" id="description"
                                            class="form-control" placeholder="Write some description" >

                                      </textarea>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="">Paid Status </label>
                                        <select name="paid_status" id="paid_status" class="form-control"
                                            style="border-radius:0px">
                                            <option value="">Select Paid Status</option>
                                            <option value="full_paid">Full Paid</option>
                                            <option value="full_due">Due Paid</option>
                                            <option value="partial_paid">Partial Paid</option>
                                        </select><br />
                                        {{-- partial paid --}}
                                        <input type="number" style="border-radius:0px;display:none" name="partial_paid"
                                            id="partial_paid" class="form-control" placeholder="partial_amount" >
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="">Paid Status </label>
                                        <select name="customer_id" id="customer_id" class="form-control select2bs4"
                                            style="border-radius:0px">
                                            <option value="">Select Customer info ..</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"> Name : {{ $customer->name }} Email :
                                                    {{ $customer->email }} Address : {{ $customer->address }}</option>
                                            @endforeach
                                            <option value="0" class="active"><strong>Add New Customer </b> </strong>
                                        </select><br />

                                    </div>

                                </div>

                                <div class="row" style="border:1px solid silver;padding:30px 3px;display:none"
                                    id="customer">
                                    <div class="input-group col-md-4">
                                        <input style="border-radius:0px" type="text" name="name" id="name"
                                            class="form-control" placeholder="customer Name">
                                    </div>
                                    <div class="input-group col-md-4">
                                        <input style="border-radius:0px" type="number" name="phone" id="phone"
                                            class="form-control" placeholder="phone number ">
                                    </div>
                                    <div class="input-group col-md-4">

                                        <input style="border-radius:0px" type="text" name="email" id="email"
                                            class="form-control" placeholder="customer email">
                                    </div><br/><br/>
                                    <div class="input-group col-md-4">
                                        <input style="border-radius:0px" type="text" name="address" id="address"
                                            class="form-control" placeholder="customer address">
                                    </div>
                                </div>
                        </div>
                        <input style="border-radius:0px;" type="submit" value="invoice store" class="btn btn-sm btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------- handlebars js ----------------->

    <script id="document_template" type="text/x-handlebars-template">

        <tr id="row_item_here" class="row_item_here">

        <input type="hidden" name="date" id="date" value="@{{ date }}">
        <input type="hidden" name="invoice_no" id="invoice_no" value="@{{ invoice_no }}">
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
            <input type="number" readonly name="total_price[]" id="total_price"  class="form-control total_price" style="border-radius:0px">
        </td>


        <td>
          <a id="remove" class="btn btn-sm btn-danger remove"><i class="fas fa-trash"></i></a>
        </td>


     </tr>
    </script>
    {{-- start javascript code --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addmoreevent', function() {
                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
                var category_id = $('#category_id').val();

                var category_name = $('#category_id').find('option:selected').text();

                var product_id = $('#product_id').val();

                var product_name = $('#product_id').find('option:selected').text();

                if (date.length === 0) {
                    document.getElementById('date_validate').innerText = "Date Field Is Required !! ";
                }
                if (category_id.length === 0) {
                    document.getElementById('category_id_validate').innerText =
                        "category_Name  Field Is Required !! ";
                }

                if (product_id.length === 0) {
                    document.getElementById('product_id_validate').innerText =
                        "product_Name  Field Is Required !! ";
                }

                // text/x-handlebars-template er tr html gula dorte hoba 

                var source = $('#document_template').html();
                var template = Handlebars.compile(source);
                var data = {

                    date: date,
                    invoice_no: invoice_no,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name

                };
                //akane data variable ta template er batore duke jaba
                var html = template(data);
                $('#addrow').append(html);

            });
            //ai code gula row k delete korer jonno 
            $(document).on('click', '#remove', function(event) {

                $(this).closest('#row_item_here').remove();

                totalfunction();
            });
            // ai code ta psc_kg and  single_product_price gun korer jonno
            $(document).on('keyup click', '#psc_kg , #single_product_price', function() {
                var psc_kg = $(this).closest("tr").find('input#psc_kg').val();

                var single_product_price = $(this).closest("tr").find('input#single_product_price').val();

                var total = psc_kg * single_product_price;

                $(this).closest('tr').find('input#total_price').val(total);

                //discount 
                $('input#discount').trigger('keyup');
            });
            //discount
            $(document).on('keyup', '#discount', function() {

                totalfunction();
            });
            //total_prices  ber korer jonno 
            function totalfunction() {
                var sum = 0;
                $('.total_price').each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum = sum + parseFloat(value);
                    }
                });

                //discount
                var discount = parseFloat($('#discount').val());
                if (!isNaN(discount) && discount.length !== 0) {
                    sum = sum - parseFloat(discount);
                }
                $('#total_prices').val(sum);

            }
            //finish totalfunction
        });

    </script>

    {{-- PAID STATUS JAVASCRIPT CODE --}}

    <script>
        $(document).ready(function() {
            $(document).on('change', '#paid_status', function() {
                var paid_status = $(this).val();
                if (paid_status == "partial_paid") {
                    $('#partial_paid').show();
                } else {
                    $('#partial_paid').hide();
                }
            });

            // CUSTOMER ADD NEW JAVASCRIPT CODE
            $(document).on('change', '#customer_id', function() {
                var customer_id = $(this).val();
                if (customer_id == "0") {
                    $('#customer').show();
                } else {
                    $('#customer').hide();
                }
            });
        });

    </script>

    {{-- end javascript code --}}

    <!-------- code ajax ---------->
    {{-- <script>
        $(document).on('change', '#category_id', function() {
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('get_product') }}",
                type: "GET",
                data: {
                    category_id: category_id
                },
                success: function(data) {
                    var html = '<option value=""> Select Product </option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    $('#product_id').html(html);
                }
            });

        });

    </script> --}}
    {{-- this code for category select --}}

    <script>
        $(document).ready(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get_invoice_product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Product Name </option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id + '">' + v.name +
                                '</option>';
                        });
                        $('#product_id').html(html);
                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $(document).on('change', '#product_id', function() {
                var product_id = $(this).val();
                $.ajax({
                    url: "{{ route('get_stock') }}",
                    type: "GET",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        $('#stock').val(data);
                    }
                });
            });

        });

    </script>




    </div>

@endsection
