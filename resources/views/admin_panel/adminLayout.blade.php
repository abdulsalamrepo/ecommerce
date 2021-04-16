<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" />
    <style>
        select{
    text-transform: uppercase;
    text-indent: 0px;
    text-align: start;
    appearance: menulist;
    align-items: center;
    cursor: pointer;
    border-radius: 10px;
    border-width: 1px;
    border-style: solid;
    color: gray;
}
input{
    border-radius: 15px !important;
    border: 1px #000 solid !important;
    padding-left: 15px !important;
}
}
::-webkit-scrollbar {
    width: 15px;
    height: 8px

  }
  ::-webkit-scrollbar-track {
    background: rgba(255, 255, 255,0);
  }
  ::-webkit-scrollbar-thumb {
    background: #5e5e5e;
    border-radius: 8px;
    box-shadow: inset 4px 4px 4px hsla(0, 0%, 100%, .25), inset 4px 4px 4px rgba(0, 0, 0, .25)
  }
  ::-webkit-scrollbar-thumb:hover {
    background: rgb(20, 20, 20);
  }
        td{
            white-space: normal !important;
        }
        .navbar.default-layout {
    font-family: "Poppins", sans-serif;
    /* background: linear-gradient(
150deg
, #4a4a4a, #0a0a0a, #d21010, #0a0a0a, #4a4a4a); */
background: url({{asset('store2/css/nav.jpeg')}});

    transition: background 0.25s ease;
    -webkit-transition: background 0.25s ease;
    -moz-transition: background 0.25s ease;
    -ms-transition: background 0.25s ease;
}
.sidebar {
    /* background: linear-gradient(
120deg
, #0a0a0a, #d21010, #0a0a0a, #d21010); */
background: url({{asset('store2/css/sidebar-4.jpg')}});
}
.sidebar .nav:not(.sub-menu) > .nav-item:not(.nav-profile) > .nav-link {
    color: #fafbfc;
}

a#uploadPhotoBtn
{
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    width: 100px;
    height: 100px;
    background: #d61f4f;
    display: -webkit-box;
    display: flex;
    border: 1px solid #d61f1f;
    color: white;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    padding: 5px;
    font-size: 14px;
    box-shadow: 0 0 5px;
    /* margin: .3rem; */
    width: 30%;
    margin-left: 7%;
}

#uploadPhotoBtn:hover
{
    background: #c7c7c7;
    text-decoration: none;
}
.background_pre_gray
{
    /* background-color: #bfb5b5; */
    padding: 5px;
    font-size: 25px;
}

  ::-webkit-scrollbar {
        width: 15px;
        height: 8px
    }
  ::-webkit-scrollbar-track {
    background: rgba(255, 255, 255,0);
    }
  ::-webkit-scrollbar-thumb {
    background: #5e5e5e;
    border-radius: 8px;
    box-shadow: inset 4px 4px 4px hsla(0, 0%, 100%, .25), inset 4px 4px 4px rgba(0, 0, 0, .25)
    }
  ::-webkit-scrollbar-thumb:hover {
    background: rgb(20, 20, 20);
    }
    </style>
    @yield('head')

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row p-0">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('admin.dashboard')}}">
                    <div>
                        <img src="{{asset($ms->logo)}}" style="height:60px;">
                        </div>
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}">
                    <div style="color: #007bff;">MAT</div>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <div class="navbar-nav" style="font-size: 25px">
                        <div >
                            <a class="nav-link m-2"  href="{{route('admin.icons')}}" target="_blank"" >
                                <span class="profile-text" style="color: white" title="icon list"><i class="fa fa-list" aria-hidden="true"> </i></span>
                            </a>
                        </div>
                        <div >
                            <a class="nav-link m-2"  href="{{route('user.home')}}" target="_blank"" >
                                <span class="profile-text" style="color: white" title="go to store"><i class="fa fa-home" aria-hidden="true"> </i></span>
                            </a>
                        </div>
                </div>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-block">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <span class="profile-text">{{$ms->name}}</span>
                            <img class="img-xs rounded-circle" src="{{asset('images/faces/face1.jpg')}}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <br>
                            <br>
                            <a class="dropdown-item" href="{{route('admin.logout')}}">
                                Sign Out
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>

        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav" style="position: fixed">
                    <li class="nav-item nav-profile">
                        <div class="nav-link">
                            <div class="user-wrapper">
                                <div class="profile-image">
                                    <img src="{{asset('images/faces/face1.jpg')}}" alt="profile image">
                                </div>
                                <div class="text-wrapper" >
                                    <p class="profile-name" style="color: white">{{$ms->name}}</p>
                                    <div>
                                        <small class="designation text-muted">Admin</small>
                                        <span class="status-indicator online"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item {{Route::is('admin.dashboard') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <i class="menu-icon mdi mdi-television"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.products') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.products')}}">
                            <i class="menu-icon mdi mdi-cart-outline"></i>
                            <span class="menu-title">Products</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.categories') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.categories')}}">
                            <i class="menu-icon mdi mdi-view-grid"></i>
                            <span class="menu-title">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.orderManagement')}}">
                            <i class="menu-icon mdi mdi-content-paste"></i>
                            <span class="menu-title">Order Management</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.slides') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.slides')}}">
                            <i class="menu-icon mdi mdi-attachment"></i>
                            <span class="menu-title">Slides</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.market.settings') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.market.settings')}}">
                            <i class="menu-icon mdi mdi-account-settings"></i>
                            <span class="menu-title">Market Settings</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.categories') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.exclusive.product')}}">
                            <i class="menu-icon mdi mdi-reproduction"></i>
                            <span class="menu-title">Exclusive Products</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">

                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->

    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>

    <!--    Jquery Validation-->
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@yield('js')
    <!-- End custom js for this page-->
</body>

</html>
