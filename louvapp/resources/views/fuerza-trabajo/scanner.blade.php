

<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

    <head>
        <meta charset="utf-8" />
        <title>Registro de entrada y salida</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                                        <div class="col-6"><h4 class="mt-3 my-1">FECHA: <br><span id="fechaDeCheck">{{date("d-m-Y", strtotime($arrayWorker['date']))}}</span></h4></div>
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
                                        <input type="hidden" name="idProject_project" id="idProject_project" value="{{$arrayWorker['worker']->idProyecto}}">
                                        <input type="hidden" name="idContractor_contractors" id="idContractor_contractors" value="{{$arrayWorker['worker']->idContractor_contractors}}">
                                        
                                        
                                        <table class="table mb-0" id="tableAttendences" style="display: {{$arrayWorker['style']}}">
                                            <thead>
                                                <tr>
                                                    <th><h6>HORA DE ENTRADA</h6></th>
                                                    <th><h6>HORA DE SALIDA</h6></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td>{{$arrayWorker['horaEntrada']}}</td>
                                                <td>{{$arrayWorker['horaSalida']}}</td>
                                            </tbody>
                                        </table>
                                    <h4 class="mt-3 my-1">{{$arrayWorker['message']}}</h4>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <a onclick="checarEntrada()" class="btn w-100 btn-success"  data-bs-placement="top">ENTRADA</a>
                                        </div>
                                        <div class="col-6">
                                            <a onclick="checarSalida()"  class="btn w-100 btn-danger"  data-bs-placement="top">SALIDA</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-alt">
             <script>document.write(new Date().getFullYear())</script> ©  Louva Studio
        </footer>

    <script>
        var checarEntradaRoute = '{{ route('scanner.checarEntrada', ['idWorker' => $arrayWorker['worker']->idWorker]) }}';
        var checarSalidaRoute = '{{ route('scanner.checarSalida', ['idWorker' => $arrayWorker['worker']->idWorker]) }}';
    </script>

    <!-- Vendor js -->
    <script src="{{ asset("/assets/js/vendor.min.js") }}"></script>
    
    <!-- App js -->
    <script src="{{ asset("/assets/js/app.min.js") }}"></script>
    </body>
    <script>
        // Actualiza el reloj cada segundo
        setInterval(updateClock, 1000);
        // Llama a la función para mostrar la hora actual de inmediato
        updateClock();
        </script>
        <!-- Info Alert Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ri-alert-line h1 text-warning"></i>
                        <h4 class="mt-2" id="modalTitle"></h4>
                        <p id="modalMessage"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
