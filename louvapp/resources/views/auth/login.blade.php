<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Log In | Louva</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("/assets/images/favicon.ico") }}">
    <!-- Theme Config Js -->
    <script src="{{ asset("/assets/js/hyper-config.js") }}"></script>
    <!-- App css -->
    <link href="{{ asset("/assets/css/app-modern.min.css") }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset("/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-3">
                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="{{ url("index.html") }}" class="logo-dark">
                        <span><img src="{{ asset("/assets/images/logo-dark.png") }}" alt="dark logo" height="125px"></span>
                    </a>
                    <a href="{{ url("index.html") }}" class="logo-light">
                        <span><img src="{{ asset("/assets/images/logo.png") }}" alt="logo" height="150px"></span>
                    </a>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- Agrega el token CSRF -->
                <div class="my-auto">
                    <div class="mb-3"></div>
                    <div class="mb-3"></div>
                    <div class="mb-3">                            
                        <label for="emailaddress" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingresa tu email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingresa tu password" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                    <!--<div class="row mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>-->
                    
                    <div class="d-grid mb-0 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Ingresar') }}
                        </button>

                        @if (Route::has('password.request'))
                            <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>-->
                        @endif
                    </div>
                    <br>
                    <div class="d-grid mb-3 text-center">
                        <a href="" class="btn btn-success">
                            {{ __('Registrarse') }}
                        </a>
                    </div>
                    </form><!-- end form-->
                

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <!--<p class="text-muted">Don't have an account? <a href="pages-register-2.html" class="text-muted ms-1"><b>Sign Up</b></a></p>-->
                </footer>

            </div> <!-- end .card-body -->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <!--<div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">Louva Studio</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i>Estudio de arquitectura, ingeniería y urbanismo <i class="mdi mdi-format-quote-close"></i>
                </p>
     
            </div>  end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
</div>
    <!-- end auth-fluid-->
    <!-- Vendor js -->
    <script src="{{ asset("/assets/js/vendor.min.js") }}"></script>

    <!-- App js -->
    <script src="{{ asset("/assets/js/app.min.js") }}"></script>

</body>

</html>





