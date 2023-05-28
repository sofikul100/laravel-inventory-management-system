<?php
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
Route::prefix('user')->group(function () {
        Route::get('view', 'User\UserController@view')->name('user.view');
        Route::get('add', 'User\UserController@add')->name('user.add');
        Route::post('store', 'User\UserController@store')->name('user.store');
        Route::get('edit{id}', 'User\UserController@edit')->name('user.edit');
        Route::post('update{id}', 'User\UserController@update')->name('user.update');
        Route::get('delete{id}', 'User\UserController@delete')->name('user.delete');
    });
Route::prefix('profile')->group(function () {
        Route::get('view', 'Profile\ProfileController@view')->name('profile.view');
        Route::get('edit{id}', 'Profile\ProfileController@edit')->name('profile.edit');
        Route::post('update{id}', 'Profile\ProfileController@update')->name('profile.update');
        Route::get('password/change', 'Profile\ProfileController@passwordform')->name('password.form');
        Route::post('password/update', 'Profile\ProfileController@password_update')->name('password.update');
    });

    Route::prefix('supplier')->group(function () {
        Route::get('view', 'Supplier\SupplierController@view')->name('supplier.view');
        Route::get('add', 'Supplier\SupplierController@add')->name('supplier.add');
        Route::post('store', 'Supplier\SupplierController@store')->name('supplier.store');
        Route::get('edit{id}', 'Supplier\SupplierController@edit')->name('supplier.edit');
        Route::post('update{id}', 'Supplier\SupplierController@update')->name('supplier.update');
        Route::get('delete{id}', 'Supplier\SupplierController@delete')->name('supplier.delete');
    });

    Route::prefix('units')->group(function () {
        Route::get('view', 'Unit\UnitController@view')->name('units.view');
        Route::get('add', 'Unit\UnitController@add')->name('units.add');
        Route::post('store', 'Unit\UnitController@store')->name('units.store');
        Route::get('edit{id}', 'Unit\UnitController@edit')->name('units.edit');
        Route::post('update{id}', 'Unit\UnitController@update')->name('units.update');
        Route::get('delete{id}', 'Unit\UnitController@delete')->name('units.delete');
    });
    Route::prefix('category')->group(function () {
        Route::get('view', 'Category\CategoryController@view')->name('category.view');
        Route::get('add', 'Category\CategoryController@add')->name('category.add');
        Route::post('store', 'Category\CategoryController@store')->name('category.store');
        Route::get('edit{id}', 'Category\CategoryController@edit')->name('category.edit');
        Route::post('update{id}', 'Category\CategoryController@update')->name('category.update');
        Route::get('delete{id}', 'Category\CategoryController@delete')->name('category.delete');
    });
    Route::prefix('customer')->group(function () {
        Route::get('view', 'Customer\CustomerController@view')->name('customer.view');
        Route::get('add', 'Customer\CustomerController@add')->name('customer.add');
        Route::post('store', 'Customer\CustomerController@store')->name('customer.store');
        Route::get('edit{id}', 'Customer\CustomerController@edit')->name('customer.edit');
        Route::post('update{id}', 'Customer\CustomerController@update')->name('customer.update');
        Route::get('delete{id}', 'Customer\CustomerController@delete')->name('customer.delete');
        Route::get('/credit','Customer\CustomerController@credit_customer')->name('customer.credit');
        Route::get('credit/edit/{id}','Customer\CustomerController@credit_customer_edit')->name('credit.customer.eidt');
        Route::post('credit/due.amount{id}','Customer\CustomerController@dueamount')->name('credit.customer.due.amount');
        Route::get('due/summary/{id}','Customer\CustomerController@due_summary')->name('customer.due.list');
        Route::get('paid/list','Customer\CustomerController@paid_customer')->name('paid.customer.list');
        Route::get('paid/list/PDF/{id}','Customer\CustomerController@customer_paid_list_pdf')->name('customer.paid.list.pdf');
        Route::get('customer/wise/report','Customer\CustomerController@customer_report')->name('customer.wise.report');
        Route::post('credit/customer','Customer\CustomerController@credit_customer_report')->name('credit.customer');
        Route::post('paid/customer/pdf','Customer\CustomerController@paid_customer_report_pdf')->name('paid.customer');
    });
    Route::prefix('product')->group(function () {
        Route::get('view', 'Product\ProductController@view')->name('product.view');
        Route::get('add', 'Product\ProductController@add')->name('product.add');
        Route::post('store', 'Product\ProductController@store')->name('product.store');
        Route::get('edit{id}', 'Product\ProductController@edit')->name('product.edit');
        Route::post('update{id}', 'Product\ProductController@update')->name('product.update');
        Route::get('delete{id}', 'Product\ProductController@delete')->name('product.delete');
        Route::get('credit/customer/pdf','Customer\CustomerController@download_pdf_customer')->name('credit.customer.pdf');
    });

    Route::prefix('purchase')->group(function () {
        Route::get('view', 'Purchase\PurchaseController@view')->name('purchase.view');
        Route::get('add', 'Purchase\PurchaseController@add')->name('purchase.add');
        Route::post('store','Purchase\PurchaseController@store')->name('purchase.store');
        Route::get('delete{id}','Purchase\PurchaseController@delete')->name('purchase.delete');
        Route::get('approve','Purchase\PurchaseController@approve')->name('purchase.approve');
        Route::get('approved_icon{id}','Purchase\PurchaseController@approved_stock')->name('purchase.approved_icon');
        Route::get('daily/report','Purchase\PurchaseController@parchase_report')->name('parchase.report');
        Route::post('parchase/show/pdf','Purchase\PurchaseController@purchase_pdf')->name('parchase.show.pdf');
    });
          //this route is defult controller 
          Route::get('/get_category','DefaultControlller@getcategory')->name('get_category');
          Route::get('/get_product','DefaultControlller@getproduct')->name('get_product');
          Route::get('/get_invoice_product','DefaultController2@getproducts')->name('get_invoice_product');
          Route::get('/get_stock','DefaultController2@getstock')->name('get_stock');
          //this route is default controller 
    Route::prefix('invoice')->group(function () {
        Route::get('view', 'Invoice\InvoiceController@view')->name('invoice.view');
        Route::get('add', 'Invoice\InvoiceController@add')->name('invoice.add');
        Route::post('store','Invoice\InvoiceController@store')->name('invoice.store');
        Route::get('approve','Invoice\InvoiceController@approve')->name('invoice.approve');
        Route::get('delete{id}','Invoice\InvoiceController@delete')->name('invoice.delete');
        Route::get('approve_click{id}','Invoice\InvoiceController@approve_click')->name('invoice.approve_click');
        Route::post('approve.store{id}','Invoice\InvoiceController@approvestore')->name('approve.store');
        Route::get('print.view','Invoice\InvoiceController@invoice_print_view_page')->name('invoice.print.view');
        Route::get('print/{id}','Invoice\InvoiceController@PrintInvoice')->name('invoice.print');
        Route::get('search','Invoice\InvoiceController@search_invoice')->name('search.invoice');
        Route::post('show','Invoice\InvoiceController@invoice_show')->name('invoice.show');
    });

    Route::prefix('stock')->group(function(){
         Route::get('report','Stock\StockController@stock_report')->name('stock.report');
         Route::get('download','Stock\StockController@stock_download')->name('stock.download');
         Route::get('product.supplier.wise.report','Stock\StockController@proudct_supplier_wise_report')->name('product.supplier.wise.report');
         Route::post('supplier.wise/pdf','Stock\StockController@supplier_wise_pdf')->name('supplier_wise_pdf');
         Route::post('category.wise/pdf','Stock\StockController@category_wise_pdf')->name('category_wise_pdf');
    });
});



