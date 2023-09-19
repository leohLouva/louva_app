@extends('layouts.head')

@section('titulo')
    Home
@endsection  
  
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

                    <!-- Sidebar Menu Toggle Button -->
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
        </div>

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> - <a href="https://louvastudio.com/">© Louva App</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="#">Contacta a soporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<!--end Footer -->

</body>

</html>

