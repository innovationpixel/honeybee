<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ $current_route == 'dashboard' ? 'active' : '' }} {{ !in_array($current_route, ['dashboard']) ? 'collapsed' : '' }}" href="{{ route('dashboard') }}">
        <i class="bi bi-layers"></i><span>Dashboard</span>
        <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
      </a>
    </li>

    <!-- Blogs -->
    <!-- <li class="nav-item">
      <a class="nav-link {{ !in_array($current_route, ['add-blog', 'blogs-list']) ? 'collapsed' : '' }}" data-bs-target="#tables-nav-blog" data-bs-toggle="collapse" href="">
        <i class="fa fa-blog"></i><span>Blogs</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav-blog" class="nav-content collapse {{ in_array($current_route, ['add-blog', 'blogs-list']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ $current_route == 'add-blog' ? 'active' : '' }}" href="{{ route('add-blog') }}">
              <i class="bi bi-circle"></i><span>Add Blog</span>
            </a>
          </li>
          <li>
            <a class="{{ $current_route == 'blogs-list' ? 'active' : '' }}" href="{{ route('blogs-list') }}">
              <i class="bi bi-circle"></i><span>Blogs List</span>
            </a>
          </li>
      </ul>
    </li> -->

    <!-- Categories -->
    <li class="nav-item">
      <a class="nav-link {{ !in_array($current_route, ['add-category', 'edit-category', 'categories-list']) ? 'collapsed' : '' }}" data-bs-target="#tables-nav-category" data-bs-toggle="collapse" href="">
        <i class="fa fa-tree"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav-category" class="nav-content collapse {{ in_array($current_route, ['add-category', 'edit-category', 'categories-list']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a class="{{ $current_route == 'add-category' ? 'active' : '' }}" href="{{ route('add-category') }}">
            <i class="bi bi-circle"></i><span>Add Category</span>
          </a>
        </li>
        <li>
          <a class="{{ $current_route == 'categories-list' ? 'active' : '' }}" href="{{ route('categories-list') }}">
            <i class="bi bi-circle"></i><span>Categories List</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Sub Category -->
    <li class="nav-item">
      <a class="nav-link {{ !in_array($current_route, ['add-sub-category', 'sub-categories-list']) ? 'collapsed' : '' }}" data-bs-target="#tables-nav-tag" data-bs-toggle="collapse" href="">
        <i class="fa fa-users"></i><span>Sub Categories</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav-tag" class="nav-content collapse {{ in_array($current_route, ['add-sub-category' ,'sub-categories-list']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a class="{{ $current_route == 'add-sub-category' ? 'active' : '' }}" href="{{ route('add-sub-category') }}">
            <i class="bi bi-circle"></i><span>Add Sub Category</span>
          </a>
        </li>

        <li>
          <a class="{{ $current_route == 'sub-categories-list' ? 'active' : '' }}" href="{{ route('sub-categories-list') }}">
            <i class="bi bi-circle"></i><span>Sub Categories List</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Customers -->
    <li class="nav-item">
        <a class="nav-link {{ !in_array($current_route, ['customers-list']) ? 'collapsed' : '' }}" data-bs-target="#tables-nav-customer" data-bs-toggle="collapse" href="">
          <i class="fa fa-users"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav-customer" class="nav-content collapse {{ in_array($current_route, ['customers-list']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">

            <li>
              <a class="{{ $current_route == 'customers-list' ? 'active' : '' }}" href="{{ route('customers-list') }}">
                <i class="bi bi-circle"></i><span>Customers List</span>
              </a>
            </li>
        </ul>
      </li>


    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link {{ !in_array($current_route, ['orders-list','change_order_status','view-order-detail']) ? 'collapsed' : '' }}" data-bs-target="#tables-nav-order" data-bs-toggle="collapse" href="">
          <i class="fa fa-box"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav-order" class="nav-content collapse {{ in_array($current_route, ['orders-list','change_order_status','view-order-detail']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">

            <li>
              <a class="{{ $current_route == 'orders-list' ? 'active' : '' }}" href="{{ route('orders-list') }}">
                <i class="bi bi-circle"></i><span>Orders List</span>
              </a>
            </li>
        </ul>
    </li>

    <!-- Leads -->
    <li class="nav-item">
        <a class="nav-link {{ !in_array($current_route, ['leads-list','view-lead']) ? 'collapsed' : '' }}" data-bs-target="#tables-nav-leads" data-bs-toggle="collapse" href="">
          <i class="fa fa-user"></i><span>Leads</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav-leads" class="nav-content collapse {{ in_array($current_route, ['leads-list','view-lead']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">

            <li>
              <a class="{{ $current_route == 'leads-list' ? 'active' : '' }}" href="{{ route('leads-list') }}">
                <i class="bi bi-circle"></i><span>Leads List</span>
              </a>
            </li>
        </ul>
    </li>


    <!-- Products -->
    <li class="nav-item">
      <a class="nav-link {{ !in_array($current_route, ['add-product', 'edit-product', 'products-list','view-product']) ? 'collapsed' : '' }}" data-bs-target="#tables-nav-projects" data-bs-toggle="collapse" href="">
        <i class="fa fa-shopping-cart"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav-projects" class="nav-content collapse {{ in_array($current_route, ['add-product', 'edit-product', 'products-list','view-product']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ $current_route == 'add-product' ? 'active' : '' }}" href="{{ route('add-product') }}">
              <i class="bi bi-circle"></i><span>Add Product</span>
            </a>
          </li>
          <li>
            <a class="{{ $current_route == 'products-list' ? 'active' : '' }}" href="{{ route('products-list') }}">
              <i class="bi bi-circle"></i><span>Products List</span>
            </a>
          </li>
      </ul>
    </li>

    <!-- Logout -->
    <!-- <li class="nav-item" style="margin-top: 30px !important;">
        <button type="submit" class="nav-link">
          <i class="bi bi-box-arrow-right"></i><span>Logout</span>
        </button>
    </li> -->

  </ul>

</aside>
