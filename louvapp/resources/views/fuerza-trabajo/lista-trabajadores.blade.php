@extends('layouts.app')

<!-- Datatables css -->
<link href="{{ asset("/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />

@section('main_container')
<style>
    
</style>
    <!-- start page title -->
    <div class="row">
        <div class="col-6">
            <div class="page-title-box">
                <div class="page-title-left">
                    <h4 class="page-title"> <i class="uil uil-constructor"></i> LISTA DE TRABAJADORES (TOTAL ACTUAL: {{ $totalTrabajadores }})</h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="page-title-right">
                
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-datatable-preview">
                            <table id="fixed-header-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE DEL TRABAJADOR</th>
                                        <th>EMPRESA</th>
                                        <th>PUESTO</th>
                                        <th>NSS</th>
                                        <th>TELÉFONO</th>
                                        <th>TEL. EMERGENCIA</th>
                                        <th>SANGRE</th>
                                        <th>E. CRÓNICAS</th>
                                        <th>ALERGIAS</th>
                                        <th>DETALLE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workers as $worker)
                                        <tr>
                                            <td>{{$worker->idUser}}</td>
                                            <td>{{strtoupper($worker->lastName)}} {{strtoupper($worker->name)}}</td>
                                            <td>{{strtoupper($worker->contractorName)}}</td>
                                            <td>{{strtoupper($worker->jobName)}}</td>
                                            <td>{{strtoupper($worker->nss)}}</td>
                                            <td>{{strtoupper($worker->personalPhone)}}</td>
                                            <td>{{strtoupper($worker->emergencyPhone)}}</td>
                                            <td>{{strtoupper($worker->blodType)}}</td>
                                            <td>{{strtoupper($worker->chronicDiseases)}}</td>
                                            <td>{{strtoupper($worker->alergies)}}</td>
                                            <td><a href="{{ route('fuerza-trabajo.editar-trabajador.show', ['idUser' => $worker->idUser]) }}" onclick="verFormEditarTrabajador()" class="btn btn-outline-success rounded-pill" target="_blank"><i class="mdi mdi-account me-1"></i>VER DETALLE</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

 <!-- Datatable Demo Aapp js -->
 <script src="{{ asset("/assets/js/pages/demo.datatable-init.js") }}"></script>
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