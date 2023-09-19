<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">
    <head>
        <meta charset="utf-8" />
        <title>@yield('titulo') - Louvapp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

        <!-- Bootstrap JS (in the footer of your HTML file) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

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
        
        
    </head>
