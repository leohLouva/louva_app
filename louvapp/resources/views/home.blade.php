
<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="light" data-menu-color="dark" data-sidenav-user="true">
    <head>
        <meta charset="utf-8" />
        <title> Homes - Louvapp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">-->

        <!-- Bootstrap JS (in the footer of your HTML file) 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>-->

        <script src="{{ asset("/assets/vendor/jquery/jquery.min.js") }}"></script>
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset("/assets/images/favicon.ico") }}">
        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{ asset("/assets/vendor/daterangepicker/daterangepicker.css") }}">
        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{ asset("/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css") }}">
        <!-- Theme Config Js -->
        <script src="{{ asset("/assets/js/hyper-config.js") }}"></script>
        <!-- App css -->
        <link href="{{ asset("/assets/css/app-modern.min.css") }}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- Icons css -->
        <link href="{{ asset("/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
                                       
        <!-- Vendor js -->
        <script src="{{ asset("/assets/js/vendor.min.js") }}"></script>
        <!-- Daterangepicker js -->
        <script src="{{ asset("/assets/vendor/daterangepicker/moment.min.js") }}"></script>
        <script src="{{ asset("/assets/vendor/daterangepicker/daterangepicker.js") }}"></script>
        
        <!-- Vector Map js -->
        <script src="{{ asset("/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
        <script src="{{ asset("/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js") }}"></script>
        <!-- Dashboard App js -->
        <script src="{{ asset("/assets/js/pages/demo.dashboard.js") }}"></script>
        <!-- App js -->
        <script src="{{ asset("/assets/js/axios.js") }}"></script>
        <script src="{{ asset("/assets/js/app.min.js") }}"></script>
        <script src="{{ asset("/assets/js/menu_functions.js") }}"></script>
        <!-- Js para las vistas-->
        <script src="{{ asset("/assets/js/views/user.js") }}"></script>
        
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        
    </head>  
<body>

    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-lg-2 gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ url('/home') }}" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="{{ url('/home') }}" class="logo-dark">
                            <span class="logo-lg">
                                <img src="{{ asset("/assets/images/logo-dark.png") }}" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ asset("/assets/images/logo-dark-sm.png") }}" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button hide menu-->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                </div>
                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line font-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                   

                    
                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                            <i class="ri-moon-line font-22"></i>
                        </div>
                    </li>


                    <li class="d-none d-md-inline-block">
                        <a class="nav-link" href="" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line font-22"></i>
                        </a>
                    </li>
                    
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-flex flex-column gap-1 d-none">
                                <h5 class="my-0"> {{ Auth::user()->userName }}</h5>
                                <h6 class="my-0 fw-normal">Founder</h6>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenido (a)</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-account-edit me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-lifebuoy me-1"></i>
                                <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-lock-outline me-1"></i>
                                <span>Lock Screen</span>
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                            <!-- item-->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

                <!-- ========== Left Sidebar Start ========== -->
                <div class="leftside-menu">

                    <!-- Brand Logo Light -->
                    <a href="#" class="logo logo-light">
                        <span class="logo-lg">
                            <img src="assets/images/logo.png" alt="logo">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="small logo">
                        </span>
                    </a>
        
                    <!-- Brand Logo Dark -->
                    <a href="#" class="logo logo-dark">
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="dark logo">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo-dark-sm.png" alt="small logo">
                        </span>
                    </a>
        
                    <!-- Sidebar Hover Menu Toggle Button -->
                    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                        <i class="ri-checkbox-blank-circle-line align-middle"></i>
                    </div>
        
                    <!-- Full Sidebar Menu Close Button -->
                    <div class="button-close-fullsidebar">
                        <i class="ri-close-fill align-middle"></i>
                    </div>
        
                    <!-- Sidebar -left -->
                    <div class="h-100" id="leftside-menu-container" data-simplebar>
                        <!-- Leftbar User -->
                        <div class="leftbar-user">
                            <a href="{{ url('/home') }}">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                                <span class="leftbar-user-name mt-2">{{ Auth::user()->userName }}</span>
                            </a>
                        </div>
                        
                        <!--- Sidemenu -->
                       <ul class="side-nav">
                            <li class="side-nav-title">MENÚ</li>
                            <!--<li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                                    <i class=""></i><span> Usuarios </span><span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultiLevel">
                                    <ul class="side-nav-second-level">
                                        <li><a href="#" onclick="actionMenu(event,'user','view')">Ver Usuarios</a></li>
                                        <li><a href="#" onclick="actionMenu(event,'user','add')">Agregar Usuario</a></li>
                                    </ul>
                                </div>
                            </li>-->
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                                    <i class="uil-folder-plus"></i>
                                    <span> Usuarios </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultiLevel">
                                    <ul class="side-nav-second-level">
                                        <li><a href="#" onclick="actionMenu(event,'user','view')">Ver Usuarios</a></li>
                                        <li><a href="#" onclick="actionMenu(event,'user','add')">Agregar Usuario</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                       
                        <div class="clearfix"></div>
                    </div>
                </div>


        <!-- Aqui se carga todo el sistema-->
        <div class="content-page">
            <div class="content" >
                <div class="container-fluid" id="main_container"><!--Div donde veremos el sistema-->
                   
                </div>
            </div>
                    <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> - <a href="https://louvastudio.com/" target="_blank">© Louva App</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="mailto:leonardo.hernandez@louvastudio.com">Contacta a soporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--end Footer -->
        </div>
    </div>

    <!-- Vendor js -->
    <script src="{{ asset("/assets/js/vendor.min.js") }}"></script>

    <!-- Daterangepicker js -->
    <script src="{{ asset("/assets/vendor/daterangepicker/moment.min.js") }}"></script>
    <script src="{{ asset("/assets/vendor/daterangepicker/daterangepicker.js") }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset("/assets/vendor/apexcharts/apexcharts.min.js") }}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset("/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
    <script src="{{ asset("/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js") }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset("/assets/js/pages/demo.dashboard.js") }}"></script>

    <!-- App js -->
    <script src="{{ asset("/assets/js/app.min.js") }}"></script>

</body> 
</html>

