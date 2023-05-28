@extends('software_master')
@section('title')
Product Edit Form  
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
                    <h3 class="pt-2 pl-2">Product Edit </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                           <form action="{{ route('product.update',$product_edit->id) }}" method="POST">
                               @csrf
                               <div class="form-group">
                                   <label for="supplier">Supplier Name  </label>
                                   <select required name="supplier" id="supplier" class="form-control" style="border-radius:0px">
                                      <option value="">Select Suplier </option>
                                    @foreach($suppliers as $supplier)
                                      <option value="{{ $supplier->id }}" {{ ($product_edit->supplier_id == $supplier->id)?'selected':'' }}> {{ $supplier->name }}</option>
                                    @endforeach
                                   </select>
                                   @if($errors->has('supplier'))
                                       @foreach ($errors->get('supplier') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <div class="form-group">
                                   <label for="unit">Unit Name  </label>
                                   <select required name="unit" id="unit" class="form-control" style="border-radius:0px">
                                       <option value="">Select Unit </option>
                                    @foreach($units as $unit)
                                       <option value="{{ $unit->id }}" {{ ($product_edit->unit_id == $unit->id)?'selected':'' }}>{{ $unit->name }}</option>
                                    @endforeach
                                    </select>
                                    @if($errors->has('unit'))
                                       @foreach ($errors->get('unit') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <div class="form-group">
                                   <label for="category">Category Name  </label>
                                   <select required name="category" id="category" class="form-control" style="border-radius:0px">
                                       <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                       <option value="{{ $category->id }}" {{ ($product_edit->category_id == $category->id)?'selected':'' }}>{{ $category->name }}</option>       
                                    @endforeach
                                   </select>
                                    @if($errors->has('category'))
                                       @foreach ($errors->get('category') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <div class="form-group">
                                   <label for="address">Product Name  </label>
                                   <input style="border-radius:0px"  type="text" name="name" id="name" class="form-control" value="{{ $product_edit->name }}" required>
                                    @if($errors->has('name'))
                                       @foreach ($errors->get('name') as $error)
                                         <span style="color:red">{{ $error }}</span>   
                                       @endforeach
                                   @endif
                               </div>
                               <input style="border-radius:0px"  type="submit" value="update" class="btn btn-info">
                           </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




















  </div>



@endsection