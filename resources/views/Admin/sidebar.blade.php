<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{asset('assets/img/apple-icon.png')}}" width="25" alt="ShopFusion Logo">
        </span>
        <span class="app-brand-text demo menu-text fw-bold ms-2">ShopFusion</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item">
        <a href="{{url('/admin/dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home"></i>
          <div data-i18n="Basic">Dashboard</div>
        </a>
      </li>

      <!-- Category -->
      <li class="menu-item">
        <a href="{{url('/admin/category')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Category</div>
        </a>
      </li>

      <!-- Products -->  
      <li class="menu-item open" style="">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-package"></i>
          <div data-i18n="Layouts">Products</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{url('admin/add_product')}}" class="menu-link">
              <div data-i18n="Without menu">Add Product</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{url('admin/view_product')}}" class="menu-link">
              <div data-i18n="Without navbar">View Product</div>
            </a>
          </li>
          
        </ul>
      </li>

      <!-- Orders -->
      <li class="menu-item">
        <a href="{{url('/admin/view_order')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cabinet"></i>
          <div data-i18n="Basic">Orders</div>
        </a>
      </li>

    </ul>
</aside>