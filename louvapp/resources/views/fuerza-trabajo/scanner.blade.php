

<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

    <head>
        <meta charset="utf-8" />
        <title>Registro de entrada y salida</title>
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
        <script src="{{ asset("/assets/js/views/scanner.js") }}"></script>

    </head>

    <body class="authentication-bg">
        @php
            $today = now();
        @endphp
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        
                        <!-- end card-->
                        <div class="card ribbon-box">
                            <div class="card-header text-center bg-primary">
                                <a href="{{ url("index.html") }}">
                                    <span><img src="{{ asset("/assets/images/logo.png") }}" alt="logo" height="105px"></span>                                    
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="ribbon ribbon-primary float-start"><i class="mdi mdi-account-hard-hat me-1"></i>{{$arrayWorker['worker']->statusName}}</div>
                                <div class="text-center">
                                    <p>PROYECTO: {{ strtoupper($arrayWorker['worker']->projectName) }}</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card rounded-0 shadow-none m-0">
                                                <div class="card-body text-center">
                                                    <div class="row">
                                                        <div class="col-6"><h4 class="mt-3 my-1">FECHA: <br> {{date("d-m-Y", strtotime($arrayWorker['date']))}}</h4></div>
                                                        <div class="col-6"><h4 class="mt-3 my-1">HORA: <br>  <div id="clock"></div></h4></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h4 class="mt-3 my-1">EMPRESA: {{ strtoupper($arrayWorker['worker']->contractorName) }} </h4>
                                    </div>
                                    <div class="text-center w-75 m-auto">
                                        <img src="{{ asset("/uploads/empresa/{$arrayWorker['worker']->folderName}/{$arrayWorker['worker']->foldeName}/{$arrayWorker['worker']->imgWorker}") }}" height="150" alt="user-image" class="rounded-circle shadow">
                                        <h4 class="mt-3 my-1">{{ strtoupper($arrayWorker['worker']->name) }} {{ strtoupper($arrayWorker['worker']->lastName) }} <i class="mdi mdi-check-decagram text-success"></i></h4>
                                        <div class="border rounded p-2 mb-2">
                                            CURP: {{ strtoupper($arrayWorker['worker']->curp) }} <br>
                                            RFC: {{ strtoupper($arrayWorker['worker']->rfc) }} <br>
                                            NSS: {{ strtoupper($arrayWorker['worker']->nss) }}

                                        </div>
                                        
                                    </div>
                                    <hr class="bg-dark-lighten my-3">

                                        <input type="hidden" name="idWorker" id="idWorker" value="{{$arrayWorker['worker']->idWorker}}">
                                        <form action="{{ route('scanner.checarEntrada', ['idWorker' => $arrayWorker['worker']->idWorker]) }}" method="POST" id="horaEntrada">
                                            @csrf
                                            <input type="hidden" name="idProject_project" id="idProject_project" value="{{$arrayWorker['worker']->idProyecto}}">
                                            <input type="hidden" name="idContractor_contractors" id="idContractor_contractors" value="{{$arrayWorker['worker']->idContractor_contractors}}">
                                            <input type="hidden" name="startTime" id="startTime" value="{{$today->format('Y-m-d H:i:s')}}">
                                        </form>
                                        <form action="{{ route('scanner.checarSalida', ['idWorker' => $arrayWorker['worker']->idWorker]) }}" id="horaSalida" method="POST">
                                            @csrf
                                            <input type="hidden" name="endTime" id="endTime" value="{{$today->format('Y-m-d H:i:s')}}">
                                        </form>
                                        
                                    <h4 class="mt-3 my-1">{{$arrayWorker['message']}}</h4>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <a onclick="registroDeTrabajador('in')" class="btn w-100 btn-success" {{$arrayWorker['style']}}  data-bs-placement="top">ENTRADA</a>
                                        </div>
                                        <div class="col-6">
                                            <a onclick="registroDeTrabajador('out')"  class="btn w-100 btn-danger"  {{$arrayWorker['style']}} data-bs-placement="top">SALIDA</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
             <script>document.write(new Date().getFullYear())</script> ©  Louva Studio
        </footer>
        <!-- Vendor js -->
        <script src="{{ asset("/assets/js/vendor.min.js") }}"></script>
        
        <!-- App js -->
        <script src="{{ asset("/assets/js/app.min.js") }}"></script>
    </body>
    <script>
        function updateClock() {
            const clockElement = document.getElementById('clock');
            const now = new Date();
            now.setHours(now.getHours()); // Resta 1 hora a la hora actual
            const hours = now.getHours().toString().padStart(2, '0');

            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            
            const currentTime = `${hours}:${minutes}:${seconds}`;
            clockElement.textContent = currentTime;
        }
        
        // Actualiza el reloj cada segundo
        setInterval(updateClock, 1000);
        
        // Llama a la función para mostrar la hora actual de inmediato
        updateClock();
        </script>
        
</html>
<!--route('fuerza-trabajo.editar-trabajador.show', ['idWorker' => $worker->idWorker])-->