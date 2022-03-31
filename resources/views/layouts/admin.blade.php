<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="Uzzal" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{asset('contents/admin')}}/assets/images/favicon.ico">
    <link href="{{asset('contents/admin')}}/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('contents/admin')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="{{asset('contents/admin')}}/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('contents/admin')}}/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />
    <link href="{{asset('contents/admin')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('contents/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "dark", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>
    <div id="wrapper">
      <!-- Topbar Start -->
      <div class="navbar-custom">
        <div class="container-fluid">
          <ul class="list-unstyled topnav-menu float-end mb-0">
            <li class="d-none d-lg-block">
              <form class="app-search">
                <div class="app-search-box dropdown">
                  <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search..." id="top-search">
                    <button class="btn input-group-text" type="submit">
                      <i class="uil uil-search"></i>
                    </button>
                  </div>
                  <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                    <div class="dropdown-header noti-title">
                      <h5 class="text-overflow mb-2">Found 01 results</h5>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <i class="uil uil-sliders-v-alt me-1"></i>
                      <span>User profile settings</span>
                    </a>
                  </div>
                </div>
              </form>
            </li>
            <li class="dropdown d-inline-block d-lg-none">
              <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i data-feather="search"></i>
              </a>
              <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                <form class="p-3">
                  <input type="text" class="form-control" placeholder="Search ..." aria-label="search here">
                </form>
              </div>
            </li>
            <li class="dropdown d-none d-lg-inline-block">
              <a class="nav-link dropdown-toggle arrow-none" data-toggle="fullscreen" href="#">
                <i data-feather="maximize"></i>
              </a>
            </li>
            <li class="dropdown notification-list topbar-dropdown">
              <a class="nav-link dropdown-toggle position-relative" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i data-feather="bell"></i>
                <span class="badge bg-danger rounded-circle noti-icon-badge">1</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                  <h5 class="m-0">
                    <span class="float-end">
                      <a href="#" class="text-dark">
                        <small>Clear All</small>
                      </a>
                    </span>Notification
                  </h5>
                </div>
                <div class="noti-scroll" data-simplebar>
                  <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                    <div class="notify-icon bg-primary">
                      <i class="uil uil-user-plus"></i>
                    </div>
                    <p class="notify-details">New user registered. <small class="text-muted">5 hours ago</small>
                    </p>
                  </a>
                </div>
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all"> View all <i class="fe-arrow-right"></i>
                </a>
              </div>
            </li>
            <li class="dropdown notification-list topbar-dropdown">
              <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="{{url('dashboard')}}" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('contents/admin')}}/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ms-1"> {{Auth::user()->name}} <i class="uil uil-angle-down"></i>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome !</h6>
                </div>
                <a href="pages-profile.html" class="dropdown-item notify-item">
                  <i data-feather="user" class="icon-dual icon-xs me-1"></i>
                  <span>My Account</span>
                </a>
                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                  <i data-feather="lock" class="icon-dual icon-xs me-1"></i>
                  <span>Lock Screen</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i data-feather="log-out" class="icon-dual icon-xs me-1"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
          <div class="logo-box">
            <a href="{{url('dashboard')}}" class="logo logo-dark">
              <span class="logo-sm">
                <img src="{{asset('contents/admin')}}/assets/images/logo-sm.png" alt="" height="24">
              </span>
              <span class="logo-lg">
                <img src="{{asset('contents/admin')}}/assets/images/logo-dark.png" alt="" height="24">
              </span>
            </a>
            <a href="{{url('dashboard')}}" class="logo logo-light">
              <span class="logo-sm">
                <img src="{{asset('contents/admin')}}/assets/images/logo-sm.png" alt="" height="24">
              </span>
              <span class="logo-lg">
                <img src="{{asset('contents/admin')}}/assets/images/logo-light.png" alt="" height="24">
              </span>
            </a>
          </div>
          <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
              <button class="button-menu-mobile">
                <i data-feather="menu"></i>
              </button>
            </li>
            <li>
              <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="left-side-menu">
        <div class="h-100" data-simplebar>
          <div class="user-box text-center">
            <img src="{{asset('contents/admin')}}/assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
              <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
              <div class="dropdown-menu user-pro-dropdown">
                <a href="pages-profile.html" class="dropdown-item notify-item">
                  <i data-feather="user" class="icon-dual icon-xs me-1"></i>
                  <span>My Account</span>
                </a>
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i data-feather="settings" class="icon-dual icon-xs me-1"></i>
                  <span>Settings</span>
                </a>
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i data-feather="help-circle" class="icon-dual icon-xs me-1"></i>
                  <span>Support</span>
                </a>
                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                  <i data-feather="lock" class="icon-dual icon-xs me-1"></i>
                  <span>Lock Screen</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i data-feather="log-out" class="icon-dual icon-xs me-1"></i>
                  <span>Logout</span>
                </a>
              </div>
            </div>
            <p class="text-muted">Admin Head</p>
          </div>
          <div id="sidebar-menu">
            <ul id="side-menu">
              <li><a href="{{url('dashboard')}}"><i data-feather="home"></i><span> Dashboard </span></a></li>
              <li><a href="#sidebarUser" data-bs-toggle="collapse"><i data-feather="users"></i><span> Users </span><span class="menu-arrow"></span></a>
                <div class="collapse" id="sidebarUser">
                  <ul class="nav-second-level">
                    <li><a href="{{url('dashboard/user')}}">All User</a></li>
                    <li><a href="{{url('dashboard/user/add')}}">Add User</a></li>
                    <li><a href="#">User Role</a></li>
                  </ul>
                </div>
              </li>
              <li><a href="#sidebarProduct" data-bs-toggle="collapse"><i data-feather="layers"></i><span> Products </span><span class="menu-arrow"></span></a>
                <div class="collapse" id="sidebarProduct">
                  <ul class="nav-second-level">
                    <li><a href="{{url('dashboard/product')}}">All Product</a></li>
                    <li><a href="{{url('dashboard/product/add')}}">Add Product</a></li>
                    <li><a href="{{url('dashboard/product/category')}}">Product Category</a></li>
                    <li><a href="{{url('dashboard/product/purchase')}}">Product Purchase</a></li>
                  </ul>
                </div>
              </li>
              <li><a href="#sidebarCustomer" data-bs-toggle="collapse"><i data-feather="shopping-cart"></i><span> Customers </span><span class="menu-arrow"></span></a>
                <div class="collapse" id="sidebarCustomer">
                  <ul class="nav-second-level">
                    <li><a href="{{url('dashboard/customer')}}">All Customer</a></li>
                    <li><a href="{{url('dashboard/customer/add')}}">Add Customer</a></li>
                  </ul>
                </div>
              </li>
              <li><a href="#sidebarSupplier" data-bs-toggle="collapse"><i data-feather="download"></i><span> Suppliers </span><span class="menu-arrow"></span></a>
                <div class="collapse" id="sidebarSupplier">
                  <ul class="nav-second-level">
                    <li><a href="{{url('dashboard/supplier')}}">All Supplier</a></li>
                    <li><a href="{{url('dashboard/supplier/add')}}">Add Supplier</a></li>
                  </ul>
                </div>
              </li>
              <li><a href="{{url('dashboard/recycle')}}"><i data-feather="trash-2"></i><span> Recycle Bin </span></a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out"></i><span> Logout </span></a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="page-title-right">
                    <form class="float-sm-end mt-3 mt-sm-0">
                      <div class="row g-2">
                        <div class="col-md-auto">
                          <div class="mb-1 mb-sm-0">
                            <input type="text" class="form-control" id="dash-daterange" style="min-width: 210px;" />
                          </div>
                        </div>
                        <div class="col-md-auto">
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class='uil uil-file-alt me-1'></i>Download <i class="icon">
                                <span data-feather="chevron-down"></span>
                              </i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a href="#" class="dropdown-item notify-item">
                                <i data-feather="mail" class="icon-dual icon-xs me-2"></i>
                                <span>Email</span>
                              </a>
                              <a href="#" class="dropdown-item notify-item">
                                <i data-feather="printer" class="icon-dual icon-xs me-2"></i>
                                <span>Print</span>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item notify-item">
                                <i data-feather="file" class="icon-dual icon-xs me-2"></i>
                                <span>Re-Generate</span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @yield('content')
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                &copy; Copyright <script type="text/JavaScript">document.write(new Date().getFullYear());
                            </script>
                            <a href="https://www.devziaus.ga">Developer Ziaus</a> | All rights reserved.</a>.
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="{{asset('contents/admin')}}/assets/js/vendor.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/libs/moment/min/moment.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/pages/dashboard.init.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/app.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
  </body>
</html>
