@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Usuarios') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Datatables css -->
<link href="{{ asset("/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css") }}" rel="stylesheet" type="text/css" />

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
                <div id="bodyPanelUser"></div>
                <!--<table id="users-table" class="table table-striped dt-responsive nowrap w-100"></table>-->
            </div>
        </div>
    </div>
</div>
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

<!-- Datatable Demo Aapp js -->
<script src="{{ asset("/assets/js/pages/demo.datatable-init.js") }}"></script>

<script>
    viewUsers();
</script>

