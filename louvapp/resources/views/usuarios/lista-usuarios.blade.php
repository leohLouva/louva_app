@extends('layouts.app')
<!-- Datatables css -->
<link href="{{ asset("/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />

@section('main_container')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">
                    <i class="uil-user-square"></i> Lista de usuarios</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane show active" id="basic-datatable-preview">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Id de Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Nombre de usuario</th>
                                    <th>Email</th>
                                    <th>Puesto</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->lastName}}</td>
                                        <td>{{$user->userName}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->accessName}}</td>
                                        <td><a href="{{ route('editar-usuario.show', ['id' => $user->id]) }}" class="btn btn-warning" >Ver</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
