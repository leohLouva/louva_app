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
                    <h4 class="page-title"> <i class="uil uil-constructor"></i> Lista de trabajadores</h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="page-title-right">
                <a href="{{ route('credenciales-trabajadores.indexC') }}"type="button" class="btn btn-light" > Ver Cards </a>
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
                                        <th>Nombre Completo</th>
                                        <th>Puesto</th>
                                        <th>Empresa</th>
                                        <th>NSS</th>
                                        <th>NRP</th>
                                        <th>Teléfono</th>
                                        <th>Tel Emergencia</th>
                                        <th>Sangre</th>
                                        <th>E. Crónicas</th>
                                        <th>Alergias</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workers as $worker)
                                        <tr>
                                            <td>{{$worker->idIntern_worker}}</td>
                                            <td>{{$worker->lastName}} {{$worker->name}}</td>
                                            <td>{{$worker->jobName}}</td>
                                            <td>{{$worker->contractorName}}</td>
                                            <td>{{$worker->nss}}</td>
                                            <td>{{$worker->nrp}}</td>
                                            <td>{{$worker->personalPhone}}</td>
                                            <td>{{$worker->emergencyPhone}}</td>
                                            <td>{{$worker->blodType}}</td>
                                            <td>{{$worker->chronicDiseases}}</td>
                                            <td>{{$worker->alergies}}</td>
                                            <td><a href="{{ route('fuerza-trabajo.editar-trabajador.show', ['id' => $worker->id]) }}" class="btn btn-outline-success rounded-pill"><i class="mdi mdi-account me-1"></i>Ver detalle</a></td>
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