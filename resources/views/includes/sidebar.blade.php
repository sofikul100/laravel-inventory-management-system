  @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
  @endphp
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('pos/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Amer Dokan </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('pos/image/profile_images/'.Auth::user()->photo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->user_type == "admin")
          <li class="nav-item {{ ($prefix == "/user")?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/user'?'active':'') }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 User Management   
               <i class="right fas fa-plus" style="font-size:12px;margin-top:3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.view') }}" class="nav-link {{ ($route == 'user.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.add') }}" class="nav-link {{ ($route == 'user.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User </p>
                </a>
              </li>
            </ul>
          </li>
         @endif



          <li class="nav-item {{ ($prefix == '/profile')?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/profile')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Profile  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.view') }}" class="nav-link {{ ($route == 'profile.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('password.form') }}" class="nav-link {{ ($route == 'password.form')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item {{ ($prefix == '/supplier')?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/supplier')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Supplier  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('supplier.view') }}" class="nav-link {{ ($route == 'supplier.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Supplier </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supplier.add') }}" class="nav-link {{ ($route == 'supplier.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Supplier </p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ ($prefix == '/customer')?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/customer')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Customer   Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customer.view') }}" class="nav-link {{ ($route == 'customer.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.add') }}" class="nav-link {{ ($route == 'customer.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.credit') }}" class="nav-link {{ ($route == 'customer.credit')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paid.customer.list') }}" class="nav-link {{ ($route == 'paid.customer.list')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Customer List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.wise.report') }}" class="nav-link {{ ($route == 'customer.wise.report')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Wise Report</p>
                </a>
              </li>
            </ul>
          </li>


           <li class="nav-item {{ ($prefix == "/units")?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/units')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Units  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('units.view') }}" class="nav-link {{ ($route == 'units.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Units </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('units.add') }}" class="nav-link {{ ($route == 'units.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Unit </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item {{ ($prefix == '/category')?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/category')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Category  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.view') }}" class="nav-link {{ ($route == 'category.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.add') }}" class="nav-link {{ ($route == 'category.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item {{ ($prefix == '/product')?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/product')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Product  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.view') }}" class="nav-link {{ ($route == 'product.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.add') }}" class="nav-link {{ ($route == 'product.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product </p>
                </a>
              </li>
            </ul>
          </li>
            
              <li class="nav-item {{ ($prefix == '/purchase')?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/purchase')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Purchase  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('purchase.view') }}" class="nav-link {{ ($route == 'purchase.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('purchase.add') }}" class="nav-link {{ ($route == 'purchase.add')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Purchase </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('purchase.approve') }}" class="nav-link {{ ($route == 'purchase.approve')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Purchase </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('parchase.report') }}" class="nav-link {{ ($route == 'parchase.report')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Parchase Report</p>
                </a>
              </li>
            </ul>
          </li>

                        <li class="nav-item {{ ($prefix == '/invoice')?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == '/invoice')?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Invoice  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('invoice.view') }}" class="nav-link {{ ($route == 'invoice.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invoice </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('invoice.add') }}" class="nav-link {{ ($route == 'invoice.add')?'active':'' }} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Invoice </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('invoice.approve') }}" class="nav-link {{ ($route == "invoice.approve")?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Invoice </p>
                </a>
                <li class="nav-item">
                <a href="{{ route('invoice.print.view') }}" class="nav-link {{ ($route == "invoice.print.view")?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Invoice </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('search.invoice') }}" class="nav-link {{ ($route == "search.invoice")?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Invoice </p>
                </a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item {{ ($prefix == "/stock")?'menu-open':'' }}">
            <a href="#" class="nav-link {{ ($prefix == "/stock")?'active':'' }}">
              <i class="fas fa-copy"></i> &nbsp;
              <p>
                 Stock  Management   
               <i class="right fas fa-plus" style="font-size: 12px;margin-top: 3px;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('stock.report') }}" class="nav-link {{ ($route == 'stock.report')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Report </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('product.supplier.wise.report') }}" class="nav-link {{ ($route == "product.supplier.wise.report")?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product/Supplier Wise</p>
                </a>
              </li>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>