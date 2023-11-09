@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('main_container')
<!-- Apex Chart js -->
<script src="{{ asset("/assets/vendor/apexcharts/apexcharts.min.js") }}"></script>
<!-- Daterangepicker css -->
<link rel="stylesheet" href="{{ asset("/assets/vendor/daterangepicker/daterangepicker.css") }}" type="text/css" />

<!-- Apex Chart js -->
<script src="{{ asset("/assets/vendor/apexcharts/apexcharts.min.js") }}"></script>
<script src="{{ asset("/assets/js/views/proyecto.js") }}"></script>


<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
            </div>
            <h4 class="header-title">INFORMACIÓN DEL PROYECTO </h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                <li class="nav-item">
                    <a href="#info_proyecto" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                        INFORMACIÓN
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#lista-ingresos-ft" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        INGRESOS DE TRABAJADORES
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#grafica"  onclick="getGraphic()" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        GRÁFICA
                    </a>
                </li>
            </ul>       
            <div class="tab-content">
                <div class="tab-pane show active" id="info_proyecto">
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="card-img-top" src="{{ asset("uploads/proyectos/$projects->projectImage") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-success stretched-link">{{ $projects->projectName}}</a>
                                    </h5>
                                    <p class="card-text">
                                        {{$projects->description}}
                                    </p>
                                    
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>FECHA</h5>
                                            <p>{{ $projects->fechaInicio }}</p>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <h5>COSTO TOTAL DEL PROYECTO</h5>
                                            <p>$ {{ $projects->totalScheduledCost }}</p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                        </div>
                   
                        <div class="col-4">  
                            
                            <form action="/editingProject/{{ $projects->idProject }}" method="POST" id="editingProject">
                                @csrf
                            <div class="mb-3">
                                <label class="form-label">NOMBRE DEL PROYECTO</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="" value="{{$projects->projectName}}" oninput="convertirAMayusculas(this)" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">DESCRIPCIÓN DEL PROYECTO</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="" maxlength="140" oninput="convertirAMayusculas(this)" disabled>{{$projects->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NOMBRE DEL DESARROLLADOR</label>
                                <select class="form-control select2" data-toggle="select2" id="desarrollador" name="desarrollador" oninput="convertirAMayusculas(this)" disabled>
                                    <option value="0">SELECCIONA UN DESARROLLADOR</option>
                                    @foreach ($owners as $owner)
                                        <option value="{{$owner->idUser_worker}}"@if ($owner->idUser_worker == $projects->idUser_projectManager) selected @endif>{{strtoupper($owner->name)}} {{strtoupper($owner->lastName)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">RESPONSABLE DE OBRA (DRO)</label>
                                <select class="form-control select2" data-toggle="select2" id="responsableObra" name="responsableObra" oninput="convertirAMayusculas(this)" disabled>
                                    <option value="0">SELECCIONA UN DRO</option>
                                    @foreach ($reponsables as $reponsable)
                                        <option value="{{$reponsable->id}}"@if ($reponsable->id == $projects->idUser_workManager) selected @endif>{{$reponsable->name}} {{$reponsable->lastName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="form-label">FECHA DE INICIO</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="ri-calendar-2-fill"></i></span>
                                    <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" placeholder="" aria-describedby="inputGroupPrepend" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true"  value="{{$projects->fechaInicio}}" oninput="convertirAMayusculas(this)" disabled>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">TIPO DE PROYECTO</label>
                                <select class="form-control select2" data-toggle="select2" id="tipoProyecto" name="tipoProyecto" oninput="convertirAMayusculas(this)" disabled>
                                    <option value="0">SELECCIONA UN TIPO DE PROYECTO</option>
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
                                <input type="text" id="direccion" name="direccion" class="form-control" value="{{$projects->address}}" oninput="convertirAMayusculas(this)" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ESTADO</label>
                                <select class="form-control select2" data-toggle="select2" id="estado" name="estado" oninput="convertirAMayusculas(this)" disabled>
                                    <option value="0">SELECCIONA UN ESTADO</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->idEstado}}"@if ($state->idEstado == $projects->state) selected @endif>{{strtoupper($state->estado)}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="mb-3">
                                <label class="form-label">LOCACIÓN</label>
                                <input type="text" class="form-control" name="location" id="location" value="{{strtoupper($projects->municipio)}}" oninput="convertirAMayusculas(this)" disabled>
                            </div> 
                        
                            <div class="row">
                                <div class="col-7">
                                    <input class="form-control" type="hidden" id="flImage" name="flImage" value="{{$projects->projectImage}}" oninput="convertirAMayusculas(this)" disabled>
                                    <input class="form-control" type="hidden" name="folderName" id="folderName" value="NA" oninput="convertirAMayusculas(this)" disabled>
                                    <button type="button" class="btn btn-primary" onclick="editarProyectoON()" id="on-btn" style="display: block;">Editar Proyecto</button>
                                    <button type="button" class="btn btn-primary" onclick="actualizarProyecto()" id="guardar-btn" style="display: none;">Guardar Proyecto</button>
                                </div>             
                                <div class="col-5">
                                    <button type="button" class="btn btn-danger" onclick="editarProyectoOFF()" id="off-btn" style="display: none;">Cancelar</button>

                                </div>
                            </div>
                        </form> 
                        </div>   
                      
                    </div>
                </div>
                <div class="tab-pane " id="lista-ingresos-ft">
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
                                                <td><a href="{{ route('scanner.show', ['date' => $attendence_worker->date,'id' => $attendence_worker->idWorker]) }}" target="_blank">REGISTRO</a></td>
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
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" id="idProyecto" value="{{$projects->idProject}}">
                            <div id="datepicker2">
                                <input type="text" class="form-control" id="fechaInicioScript" name="fechaInicioScript"  autocomplete="off" data-provide="datepicker" data-date-container="#datepicker2" data-date-format="d-M-yyyy" data-date-autoclose="true" placeholder="Elige una fecha">
                            </div>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary" type="button" onclick="getGraphic()" >Filtrar por empresas</button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary" type="button" onclick="graficaPorPuestoEnProyecto()" >Filtrar por puestos</button>
                        </div>
                    </div>
                    <div class="row">
                        <div id="contractorsContainer"></div>
                    </div>

                    <script>
                        var proyectoEmpresasRoutePuestos = '{{ route('proyecto.puestos') }}';
                        var proyectoEmpresasRoute = '{{ route('proyecto.empresas') }}';
                        var guardarFTProgramado = '{{ route('proyecto.empresas') }}';
                    </script>
                </div>
            </div>
        </div>
        <!-- Campo de entrada de texto para ingresar el dato -->

    </div>
</div>



    <!-- Vendor js -->
    <script src="{{ asset("/assets/js/vendor.min.js") }}"></script>
    <!-- App js -->
    <script src="{{ asset("/assets/js/app.min.js") }}"></script>
    <!-- Bootstrap Datepicker Plugin js -->
    <script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
     <!-- Datatable Demo Aapp js -->
    <script src="{{ asset("/assets/js/pages/demo.datatable-init.js") }}"></script>

    <script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
    <!-- Daterangepicker Plugin js -->
    <script src="{{ asset("/assets/vendor/daterangepicker/moment.min.js") }}"></script>
    <script src="{{ asset("/assets/vendor/daterangepicker/daterangepicker.js") }}"></script>

    <script>
        $(document).ready(function() {
            var fechaActual = new Date();
            var fechaFormateada = formatearFecha(fechaActual);
            $("#fechaInicioScript").val(fechaFormateada);

           
        });
    </script>
@endsection
@push('scriptDatatable')
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
