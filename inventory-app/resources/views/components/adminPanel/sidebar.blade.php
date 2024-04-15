<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cart-flatbed"></i>
        </div>
        <div class="sidebar-brand-text mx-3">INV MNG<sup>sys</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item @if(Request::segment(2) == 'dashboard') active @endif" >
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-house-chimney"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item @if(Request::segment(2) == 'inventory') active @endif" style="margin-top: -20px">
        <a class="nav-link" href="{{ route('admin.inventory.index') }}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Inventory</span>
        </a>
    </li>

    <li class="nav-item @if(Request::segment(2) == 'seller') active @endif" style="margin-top: -20px">
        <a class="nav-link" href="{{ route('admin.seller.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Seller</span>
        </a>
    </li>

    <li class="nav-item @if(Request::segment(2) == 'profile') active @endif" style="margin-top: -20px">
        <a class="nav-link" href="{{ route('admin.profile.edit', 'id') }}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Profile</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
