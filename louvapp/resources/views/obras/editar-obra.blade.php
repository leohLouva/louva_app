@extends('layouts.app')


@section('main_container')

    <!-- Apex Chart js -->
    <script src="{{ asset("/assets/vendor/apexcharts/apexcharts.min.js") }}"></script>
    <!-- Bootstrap Datepicker css -->
    <link href="{{asset("/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css")}} rel="stylesheet" type="text/css" />
    <script src="{{ asset("/assets/js/views/obra.js") }}"></script>
    <script src="{{ asset("/assets/js/views/obra_graficas.js") }}"></script>
    <style>
       .puesto-container {
         margin-bottom: 70px;
         margin-right: 10px; /* Mantén esta línea y elimina la línea duplicada */
             
         @media (max-width: 768px) {
           margin-right: 0; 
           margin-bottom: 10px; 
           display: block; 
         }
       }
         #puestosContainer {
             display: flex;
             flex-wrap: wrap;
         }     
         .col-4, .col-3, .col-5 {
                 margin-bottom: 20px; 
         }
         .datepicker-dropdown td.active {
             position: relative;
         }
         .datepicker-dropdown td.active:after {
             content: "";
             display: none;
             width: 12px;
             height: 12px;
             
             position: absolute;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -50%);
         }
     
         #calendarRangeCss{
             top: -300px;
             z-index: 1;
         }    
     
         #graPrinc{
             top: -300px;
         }
     
         #ftPuesto{
             top: -45px;
         }
     
     
     </style>
     
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">                                    
                <div class="page-title-right"> OBRAS</div>
                 <h4 class="header-title">DETALLES DE LA OBRA </h4>
             </div>
        </div>
     
         <div class="container">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3">
                     <li class="nav-item">
                         <h6>
                             <a href="#dashboard-obra" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                 DASHBOARD
                             </a>
                         </h6>
                     </li>
                     <li class="nav-item">
                         <h6>
                             <a href="#info_proyecto" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                 INFORMACIÓN
                             </a>
                         </h6>
                     </li>
                     <li class="nav-item">
                         <h6>
                             <a href="#lista-ingresos-ft" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">INGRESOS DE TRABAJADORES</a>
                         </h6>
                     </li>
                </ul>       
                <div class="tab-content">
                    <div class="tab-pane show active" id="dashboard-obra" >
                         <div class="row" id="bloque1">
                             <div class="col-3">
                                 <div class="card text-white bg-light overflow-hidden">
                                     <div class="card-body">
                                         <div class="toll-free-box text-center">
                                             <h4> <i class="mdi mdi-office-building-cog"></i>{{$projects->projectName}} </h4>
                                         </div>  
                                     </div>
                                 </div>
                             </div>
                             <div class="col-3">
                                 <div class="card-body bg-light text-center">
                                     <i class="uil uil-jackhammer text-muted font-24"></i>
                                     <h3><span id="cuentaTrabajadores"></span></h3>
                                     <p class="text-muted font-15 mb-0"> INGRESOS TOTALES </p>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="card">
                                     <div class="card-body">
                                         <input type="hidden" id="idProyecto" value="{{$projects->idProject}}">
                                         <div dir="ltr">
                                             <div id="line-chart-zoomable" class="apex-charts" data-colors="#fa5c7c"></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                        <div class="row">
                             <div class="col-6">
                                <div class="input-daterange input-group calendarRange" id="calendarRangeCss">
                                    <span class="input-group-addon"><p><h4><a href="#" class="badge badge-info-lighten"> DEL </a></h4></p></span> 
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="ri-calendar-2-fill"></i></span>
                                    <input autocomplete="off" type="text" class="input-sm form-control" id="dateStart" style="text-align: center;" >
                                    <span class="input-group-addon"><p><h4> <a href="#" class="badge badge-info-lighten"> AL </a></h4></p></span> 
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="ri-calendar-2-fill"></i></span>
                                    <input autocomplete="off" type="text" class="input-sm form-control" id="dateEnd" style="text-align: center;" value="{{ date('d-m-Y') }}" onchange="getHistorico()">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card" id="graPrinc">
                                    <div class="card-body">
                                        <div class="header-title">

                                        </div>
                                        <div dir="ltr">
                                            <h4 class="header-title">FUERZA DE TRABAJO DEL </h4>
                                            <div id="stacked-bar" class="apex-charts" data-colors="#727cf5,#0acf97,#fa5c7c,#6c757d,#39afd1,#F52EDD"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card" id="ftPuesto">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                         <h4 class="header-title">FUERZA DE TRABAJO POR PUESTO</h4>
                                    </div>
                                    <div class="card-body pt-0 mb-2"  style="max-height: 319px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-row" id="puestosContainer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="contractorsContainer"></div>
                        </div>
                    </div>
                    <div class="tab-pane" id="info_proyecto">
                        <form action="/editingProject/{{ $projects->idProject }}" method="POST" id="editingProject">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="card-img-top" src="{{ asset("uploads/obras/$projects->projectImage") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="#" class="text-success stretched-link">{{ $projects->projectName}}</a></h5>
                                            <p class="card-text"> {{strtoupper($projects->description)}} </p>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h5>FECHA</h5>
                                                    <p>{{  date('d-m-Y', strtotime($projects->fechaInicio))}}</p>
                                                </div>
                                                <div class="col-md-7">
                                                    <h5>COSTO TOTAL DE OBRA APROXIMADO</h5> 
                                                    <p>$ {{ number_format($projects->totalScheduledCost, 0, '.', ',') }}</p>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-4">  
                                    <div class="mb-3">
                                        <label class="form-label">OBRA</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="" value="{{$projects->projectName}}" oninput="convertirAMayusculas(this)" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">DESCRIPCIÓN</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="" maxlength="500" oninput="convertirAMayusculas(this)" disabled>{{strtoupper($projects->description)}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NOMBRE DEL DESARROLLADOR</label>
                                        <select class="form-control select2" data-toggle="select2" id="desarrollador" name="desarrollador" oninput="convertirAMayusculas(this)" disabled>
                                            <option value="0">SELECCIONA UN DESARROLLADOR</option>
                                            @foreach ($owners as $owner)
                                                <option value="{{$owner->idUser}}"@if ($owner->idUser == $projects->idUser_projectManager) selected @endif>{{strtoupper($owner->name)}} {{strtoupper($owner->lastName)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">RESPONSABLE DE OBRA (DRO)</label>
                                        <select class="form-control select2" data-toggle="select2" id="responsableObra" name="responsableObra" oninput="convertirAMayusculas(this)" disabled>
                                            <option value="0">SELECCIONA UN DRO</option>
                                            @foreach ($reponsables as $reponsable)
                                                <option value="{{$reponsable->idUser}}"@if ($reponsable->idUser == $projects->idUser_workManager) selected @endif>{{$reponsable->name}} {{$reponsable->lastName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 position-relative" id="datepicker1">
                                        <label class="form-label">FECHA DE INICIO</label>
                                        <div class="input-daterange input-group calendarRange">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="ri-calendar-2-fill"></i></span>
                                            <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" placeholder="" aria-describedby="inputGroupPrepend" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true"  value="{{ date('d-m-Y', strtotime($projects->fechaInicio))}}" oninput="convertirAMayusculas(this)" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">TIPO</label>
                                        <select class="form-control select2" data-toggle="select2" id="tipoProyecto" name="tipoProyecto" oninput="convertirAMayusculas(this)" disabled>
                                            <option value="0">SELECCIONA UN TIPO</option>
                                            @foreach ($project_types as $project_type)
                                                <option value="{{$project_type->idProject_type}}"@if ($projects->projectType == $project_type->idProject_type) selected @endif>{{$project_type->nameProject_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>   
                                <div class="col-4">          
                                    <div class="mb-3">
                                        <label class="form-label">M<sup>2</sup> DE URBANIZACION</label>
                                        <input type="text" id="mtsSuperficiales" name="mtsSuperficiales" class="form-control" value="{{$projects->squareMeterSuperficial}}" oninput="convertirAMayusculas(this)" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">M<sup>2</sup> SÓTANO</label>
                                        <input type="text" id="mtsSotano" name="mtsSotano" class="form-control" value="{{$projects->squareMeterSotano}}" oninput="convertirAMayusculas(this)" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">SISTEMA CONSTRUCTIVO ESTRUCTURAL</label>
                                        <select class="form-control select2" data-toggle="select2" id="sistemaConstruccion" name="sistemaConstruccion" oninput="convertirAMayusculas(this)" disabled>
                                            <option value="0">SELECCIONA UNO DE LA LISTA </option>
                                            @foreach ($systemConsts as $systemConst)
                                                <option value="{{$systemConst->idConstruction_system}}"@if ($systemConst->idConstruction_system == $projects->constructionSystem) selected @endif>{{$systemConst->nameConstruction_system}}</option>
                                            @endforeach
                                        </select>                                   
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">TOTAL PROGRAMADO</label>
                                        <input type="text" id="totalCosto" name="totalCosto" class="form-control" value="{{$projects->totalScheduledCost}}" oninput="convertirAMayusculas(this)" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">DIRECCIÓN</label>
                                        <input type="text" id="direccion" name="direccion" class="form-control" value="{{strtoupper($projects->address)}}" disabled oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ESTADO</label>
                                        <select class="form-control select2" data-toggle="select2" id="estado" name="estado" onchange="getLocation()" oninput="convertirAMayusculas(this)" disabled>
                                            <option value="0">SELECCIONA UN ESTADO</option>
                                            @foreach ($states as $state)
                                                <option value="{{$state->idEstado}}"@if ($state->idEstado == $projects->state) selected @endif>{{strtoupper($state->estado)}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <div class="mb-3">
                                        <label class="form-label">LOCACIÓN</label>
                                        <select class="form-control select2" data-toggle="select2" id="location" name="location" oninput="convertirAMayusculas(this)"  disabled>
                                            @foreach ($locations as $location)
                                                <option value="{{$location->idMunicipio}}"@if ($location->idMunicipio == $projects->location) selected @endif>{{strtoupper($location->municipio)}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <div class="row">
                                        <div class="col-7">
                                            <input class="form-control" type="hidden" id="flImage" name="flImage" value="{{$projects->projectImage}}" oninput="convertirAMayusculas(this)" disabled>
                                            <input class="form-control" type="hidden" name="folderName" id="folderName" value="NA" oninput="convertirAMayusculas(this)" disabled>
                                            <button type="button" class="btn btn-primary" onclick="editarProyectoON()" id="on-btn" style="display: block;">Editar</button>
                                            <button type="button" class="btn btn-primary" onclick="actualizarProyecto()" id="guardar-btn" style="display: none;">Guardar</button>
                                        </div>             
                                        <div class="col-5">
                                            <button type="button" class="btn btn-danger" onclick="editarProyectoOFF()" id="off-btn" style="display: none;">Cancelar</button>
        
                                        </div>
                                    </div> 
                                </div>   
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="lista-ingresos-ft">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="fixed-header-datatable" class="table w-100 nowrap">
                                            <thead>
                                                <tr>
                                                    <th>NOMBRE COMPLETO</th>
                                                    <th>EMPRESA</th>
                                                    <th>PUESTO</th>
                                                    <th>DIA</th>
                                                    <th><i class="mdi mdi-clock-in"></i> ENTRADA</th>
                                                    <th><i class="mdi mdi-clock-out"></i> SALIDA</th>
                                                    <th>VER</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($attendences as $attendence_worker)
                                                <tr>
                                                    <td>{{$attendence_worker->lastName}} {{$attendence_worker->name}}</td>
                                                    <td>{{$attendence_worker->contractorName}}</td>
                                                    <td>{{$attendence_worker->jobName}}</td>
                                                    <td>{{date("d-m-Y", strtotime($attendence_worker->date))}}</td>
                                                    <td>{{$attendence_worker->startTime}}</td>
                                                    <td>{{$attendence_worker->endTime}}</td>
                                                    <td><a href="{{ route('scanner.show', ['date' => $attendence_worker->date,'id' => $attendence_worker->idUser]) }}" target="_blank">REGISTRO</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="grafica" >
                         <h4 class="header-title mb-4">Gráficas de asistencias</h4>
                         <!--<div class="row">
                             <div class="col-6">
                                 <input type="hidden" id="idProyecto" value="{{$projects->idProject}}">
                                 <div id="datepicker2">
                                     <input type="text" class="form-control" id="fechaInicioScript" name="fechaInicioScript"  autocomplete="off" data-provide="datepicker" data-date-container="#datepicker2" data-date-format="d-M-yyyy" data-date-autoclose="true" placeholder="ELIGE UNA FECHA" value="{{ date('d-m-Y', strtotime($projects->fechaInicio))}}">
                                 </div>
                             </div>
                             <div class="col-3">
                                 <button class="btn btn-primary" type="button" onclick="getGraphic()" >FILTRAR POR EMPRESA</button>
                             </div>
                             <div class="col-3">
                                 <button class="btn btn-primary" type="button" onclick="graficaPorPuestoEnProyecto()" >FILTRAR POR PUESTOS</button>
                             </div>
                         </div>
                         <div class="row">
                             <div id="contractorsContainer"></div>
                         </div>
                         -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
     
     
     
         <!-- Vendor js -->
         <script src="{{ asset("/assets/js/vendor.min.js") }}"></script>
         <!-- Bootstrap Datepicker Plugin js -->
         <script src={{ asset("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}></script>
         <!-- App js -->
         <script src="{{ asset("/assets/js/app.min.js") }}"></script>
     
         <script>
             var proyectoEmpresasRoutePuestos = '{{ route('proyecto.puestos') }}';
             var proyectoEmpresasRoute = '{{ route('proyecto.empresas') }}';
             var guardarFTProgramado = '{{ route('proyecto.empresas') }}';
         
            jQuery(document).ready(function($) {
                
                $('.calendarRange').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true,
                    orientation: 'bottom',
        
                });
                //$('#calendarRange').keypress(function (evt) { return false; });
                $("#dateStart").datepicker("update", getFormatDate(new Date));
                //$("#dateEnd").datepicker("update", getFormatDate()) ;
                
                getHistorico();
            });
         </script>
      
        @push('scriptDatatable')
            <!-- Datatable Demo Aapp js -->
            <script src="{{ asset("/assets/js/pages/demo.datatable-init.js") }}"></script>
            <!-- Datatables js -->
            <script src="{{ asset("/assets/vendor/datatables.net/js/jquery.dataTables.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js") }}"></script>
            <script src="{{ asset("/assets/vendor/datatables.net-select/js/dataTables.select.min.js") }}"></script>
        @endpush
    
@endsection