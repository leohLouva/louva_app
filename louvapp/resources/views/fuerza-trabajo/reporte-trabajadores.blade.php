@extends('layouts.app')


    <!-- Apex Chart js -->
    <script src="{{ asset("/assets/vendor/apexcharts/apexcharts.min.js") }}"></script>

@section('main_container')
<script src="{{ asset("/assets/js/views/reportes.js") }}"></script>
<!-- Daterangepicker css -->
<link rel="stylesheet" href="{{ asset("/assets/vendor/daterangepicker/daterangepicker.css") }}" type="text/css" />
        

    <!-- start page title -->

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">                                    
                <div class="page-title-right">
                    
                </div>
                <h4 class="header-title"> REPORTE DE FUERZA DE TRABAJO POR PROYECTO</h4>
            </div>
        </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-4">
            
            <div class="mb-3 position-relative" id="datepicker1">
                <label class="form-label">Fecha de inicio</label>
                <input type="text" class="form-control" id="fechaInicio" name="fechaInicio"  autocomplete="off" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true">
            </div>

            <select class="form-control select2" data-toggle="select2" name="idProyecto" id="idProyecto">
                <option value="0">SELECCIONA UN PROYECTO</option>
                @foreach ($projects as $project)
                    <option value="{{$project->idProject}}">{{strtoupper($project->projectName)}}</option>
                @endforeach
            </select>
            <br>
            <button class="btn btn-primary" type="button" onclick="getGraphicByProyect()" >Mostrar graficas</button>

        </div>
        <div class="col-8">
            
            <div id="contractorsContainer"></div>

        </div>
    </div>
   
    <div class="row">
    </div>

    <script>
        var proyectoEmpresasRoute = '{{ route('proyecto.empresas') }}';
    </script>

<script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
<!-- Daterangepicker Plugin js -->
<script src="{{ asset("/assets/vendor/daterangepicker/moment.min.js") }}"></script>
<script src="{{ asset("/assets/vendor/daterangepicker/daterangepicker.js") }}"></script>
<script>
     $(document).ready(function() {
   
   //$("#fechaInicio").datepicker("setDate", fechaActual);

   var fechaActual = new Date();
    var fechaFormateada = formatearFecha(fechaActual);

   $("#fechaInicio").val(fechaFormateada);
});
</script>

@endsection    
@push('scriptDatatable')

@endpush