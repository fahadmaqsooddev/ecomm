<?php 
use App\Models\Logo;
use Illuminate\Support\Facades\Request; // Add this line to use Request facade
$logo = Logo::first();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('admin/dist/img/'.$logo->name) }}" alt="AdminLTE Logo" class="img-circle elevation-2">
        <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/'.Auth::guard('admin')->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logo') }}" class="nav-link {{ Request::is('admin/logo') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Logo</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories') }}" class="nav-link {{ Request::is('admin/categories') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products') }}" class="nav-link {{ Request::is('admin/products') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Products</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.brand') }}" class="nav-link {{ Request::is('admin/brands') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Brands</p>
                    </a>
                </li>          
                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.links') }}" class="nav-link {{ Request::is('admin/links') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-link"></i>
                        <p>Social Media Links</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.deliveryinfo') }}" class="nav-link {{ Request::is('admin/deliveryinfo') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>Delivery Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.testimonial') }}" class="nav-link {{ Request::is('admin/testimonial') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog') }}" class="nav-link {{ Request::is('admin/blog') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.service') }}" class="nav-link {{ Request::is('admin/service') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders') }}" class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>Orders</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('admin.payments') }}" class="nav-link {{ Request::is('admin/payments') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Payments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.delivery-charges') }}" class="nav-link {{ Request::is('admin/delivery-charges') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Delivery Charges</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.allcontacts') }}" class="nav-link {{ Request::is('admin/contactus') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-life-ring"></i>
                        <p>Contact Us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact-details') }}" class="nav-link {{ Request::is('admin/contact-details') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Contact Details</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subscribers') }}" class="nav-link {{ Request::is('admin/subscribers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Subscribers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.aboutus') }}" class="nav-link {{ Request::is('admin/aboutus') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>AboutUs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
