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
                    <h4 class="page-title"><i class="uil uil-constructor"></i> Credenciales de trabajadores (Total: {{ $totalTrabajadores }})</h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="page-title-box">
                <div class="page-title">
                    <a type="button" class="btn btn-light" href="{{ route('lista-trabajadores.index') }}" >Ver Lista </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        
    @foreach ($workers as $worker)
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="rounded-circle avatar-sm" src="{{ asset("assets/images/small/small-1.jpg")}}" alt="Avtar image">
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <a href="javascript:void(0);" class="text-secondary"><h5 class="my-1">{{$worker->idIntern_worker}}-{{$worker->lastName}} {{$worker->name}}</h5></a>                                                
                        <p class="text-muted mb-0">{{$worker->jobName}}</p>
                        <p class="text-muted mb-0"><B>NSS: </B>{{$worker->nss}}</p>
                        
                    </div>

                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="{{ route('fuerza-trabajo.editar-trabajador.show', ['id' => $worker->id]) }}" class="dropdown-item"><i class="mdi mdi-account me-1"></i>Ver detalle</a>
                            <!-- item-->
                            <!--<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-block-helper me-1"></i>Block</a>-->
                            <!-- item-->
                            <div class="dropdown-divider my-1"></div>
                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="mdi mdi-trash-can-outline me-1"></i>Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center card-body py-2 border-top border-light">
                <span class="badge badge-lg bg-light text-secondary rounded-pill me-1">{{$worker->contractorName}}</span>
                <!--<h5 class="my-0 font-13 fw-semibold text-muted"><i class="mdi mdi-calendar me-1"></i> Jan 05 2022</h5>-->
                <!--<a href="" type="button" class="btn btn-outline-success rounded-pill"><i class="uil-cloud-computing"></i> Success</a>-->
            </div>
        </div>
    </div>
    @endforeach
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