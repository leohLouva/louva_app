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
            <h4 class="header-title">Editar proyecto </h4>
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
                                        <div class="col-md-5">
                                            <h5>Teléfono:</h5>
                                            <a href="tel:{{$projects->telefono}}">{{$projects->telefono}}</a>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h5>Fecha de inicio</h5>
                                            <p>{{ \Carbon\Carbon::parse($projects->fechaInicio)->formatLocalized('%d - %B - %Y') }}</p>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-5">
                                            <h5>Costo total</h5>
                                            <p>$ {{ number_format($projects->totalScheduledCost, 2, '.', ',') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h5>Tipo de proyecto:</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">{{$projects->projectType}}</label>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>% de Avance</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{  $projects->progress }}%;" aria-valuenow="{{ $projects->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $projects->progress }}%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                        </div>
                        <div class="col-4">                
                            <div class="mb-3">
                                <label class="form-label">Nombre del proyecto</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="" value="{{$projects->projectName}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" id="telefono" name="telefono" class="form-control" placeholder="" value="{{$projects->telefono}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción del proyecto</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="" maxlength="140" disabled>{{$projects->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombre del desarrollador</label>
                                <select class="form-control select2" data-toggle="select2" id="desarrollador" name="desarrollador" disabled>
                                    <option value="0">Selecciona un Desarrollador</option>
                                    @foreach ($owners as $owner)
                                        <option value="{{$owner->idUser_worker}}"@if ($owner->idUser_worker == $projects->idUser_projectManager) selected @endif>{{$owner->name}} {{$owner->lastName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombre del Responsable de obra (DRO)</label>
                                <select class="form-control select2" data-toggle="select2" id="responsableObra" name="responsableObra" disabled>
                                    <option value="0">Selecciona a un responsable de obra</option>
                                    @foreach ($reponsables as $reponsable)
                                        <option value="{{$reponsable->id}}"@if ($reponsable->id == $projects->idUser_workManager) selected @endif>{{$reponsable->name}} {{$reponsable->lastName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 position-relative">
                                <label class="form-label">% del proyecto </label>
                                <input class="form-control" type="text" name="porcentaje" id="porcentaje" value="{{$projects->progress}}" disabled>
                            </div>
                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="form-label">Fecha de inicio</label>
                                <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true" value="{{$projects->fechaInicio}}" disabled>
                            </div>
                        </div>   

                        <div class="col-4">          
                            <div class="mb-3">
                                <label class="form-label">Tipo de proyecto</label>
                                <input type="text" id="tipoProyecto" name="tipoProyecto" class="form-control" value="{{$projects->projectType}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">M<sup>2</sup> superficiales</label>
                                <input type="text" id="mtsSuperficiales" name="mtsSuperficiales" class="form-control" value="{{$projects->squareMeterSuperficial}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">M<sup>2</sup> sótano</label>
                                <input type="text" id="mtsSotano" name="mtsSotano" class="form-control" value="{{$projects->squareMeterSotano}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sistema de construcción</label>
                                <input type="text" id="sistemaConstruccion" name="sistemaConstruccion" class="form-control" value="{{$projects->constructionSystem}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total del costo programado</label>
                                <input type="text" id="totalCosto" name="totalCosto" class="form-control" value="{{$projects->totalScheduledCost}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" value="{{$projects->address}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-control select2" data-toggle="select2" id="estado" name="estado" disabled>
                                    <option value="0">Selecciona un estado</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->idEstado}}"@if ($state->idEstado == $projects->state) selected @endif>{{$state->estado}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="mb-3">
                                <label class="form-label">Locación</label>
                                <select class="form-control select2" data-toggle="select2" id="municipio" name="municipio" disabled>
                                    <option value="{{$projects->location}}">{{$projects->municipio}}</option>
                                </select>
                            </div> 
                            <div class="row">
                                <div class="col-7">
                                    <input class="form-control" type="hidden" id="flImage" name="flImage" value="{{$projects->projectImage}}" disabled>
                                    <input class="form-control" type="hidden" name="folderName" id="folderName" value="NA" disabled>
                                    <button type="button" class="btn btn-primary" onclick="editarProyectoON()" id="on-btn" style="display: block;">Editar Proyecto</button>
                                    <button type="button" class="btn btn-primary" onclick="actualizarProyecto()" id="guardar-btn" style="display: none;">Guardar Proyecto</button>
                                </div>             
                                <div class="col-5">
                                    <button type="button" class="btn btn-danger" onclick="editarProyectoOFF()" id="off-btn" style="display: none;">Cancelar</button>

                                </div>
                            </div>
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
                                                <td>{{date("h:i A", strtotime($attendence_worker->startTime))}}</td>
                                                <td>{{date("h:i A", strtotime($attendence_worker->endTime))}}</td>
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
                            <input type="hidden" id="idProyecto" value="{{$projects->id}}">
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
                    </script>
                </div>
            </div>
        </div>
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
       