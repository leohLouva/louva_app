@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
@section('main_container')
<script src="{{ asset("/assets/js/views/proyecto.js") }}"></script>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                
            </div>
            <h4 class="page-title">Crear Nuevo Proyecto</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- start page form-create-project -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">            
                <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                <label class="form-label">Imagen del proyecto</label>
                <input type="hidden" name="hdnType" value="proyecto">
                <form action="{{ route('imagenes.storeProject')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
                    <div class="dz-message needsclick">
                        <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                        <h4>Suelta los archivos aquí o haz clic para cargarlos.</h4>
                    </div>
                </form>
                <div class="dropzone-previews mt-3" id="file-previews"></div>

                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">           
                <form action="/addingProject" method="POST" id="projectForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre del proyecto</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción del proyecto</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="" maxlength="140"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre del desarrollador</label>
                        <select class="form-control select2" data-toggle="select2" id="desarrollador" name="desarrollador">
                            <option value="0">Selecciona un Desarrollador</option>
                            @foreach ($owners as $ownser)
                                <option value="{{$ownser->id}}">{{$ownser->name}} {{$ownser->lastName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre del Responsable de obra (DRO)</label>
                        <select class="form-control select2" data-toggle="select2" id="responsableObra" name="responsableObra">
                            <option value="0">Selecciona un Desarrollador</option>
                            @foreach ($reponsables as $reponsable)
                                <option value="{{$reponsable->id}}">{{$reponsable->name}} {{$reponsable->lastName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 position-relative">
                        <label class="form-label">% del proyecto </label>
                        <input class="form-control" type="text" name="porcentaje" id="porcentaje" value="">
                    </div>
                    <div class="mb-3 position-relative" id="datepicker1">
                        <label class="form-label">Fecha de inicio</label>
                        <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" id="flImage" name="flImage" value="">
                        <input class="form-control" type="hidden" name="folderName" id="folderName" value="NA">

                        <button type="button" class="btn btn-primary" onclick="agregarProyecto()" >
                            Crear Proyecto
                        </button>
                    </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">            
                    <div class="mb-3">
                        <label class="form-label">Tipo de proyecto</label>
                        <input type="text" id="tipoProyecto" name="tipoProyecto" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">M<sup>2</sup> superficiales</label>
                        <input type="text" id="mtsSuperficiales" name="mtsSuperficiales" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">M<sup>2</sup> sótano</label>
                        <input type="text" id="mtsSotano" name="mtsSotano" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sistema de construcción</label>
                        <input type="text" id="sistemaConstruccion" name="sistemaConstruccion" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total del costo programado</label>
                        <input type="text" id="totalCosto" name="totalCosto" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select class="form-control select2" data-toggle="select2" id="estado" name="estado">
                            <option value="0">Selecciona un estado</option>
                            @foreach ($states as $state)
                                <option value="{{$state->idEstado}}">{{$state->estado}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="mb-3">
                        <label class="form-label">Locación</label>
                        <select class="form-control select2" data-toggle="select2" id="locacion" name="locacion">
                            <option value="0">Elige un municipio según el estado</option>
                        </select>
                    </div>          
                </form>
            </div>
        </div>
    </div> <!-- end col-->
</div>
<!-- end page form-create-project -->
<!-- Bootstrap Datepicker Plugin js -->
<script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
<script>
    $(document).ready(function() {
        $('#estado').on('change', function() {
            var estadoId = $(this).val();
            if (estadoId > 0) {
                $.ajax({
                    url: '/municipios/' + estadoId,
                    type: 'GET',
                    success: function(data) {
                        var locacionSelect = $('#locacion');
                        locacionSelect.empty(); 
                        console.log(data);
                        $.each(data, function(key, value) {
                            console.log(value);
                            locacionSelect.append('<option value="' + value.idMunicipio + '">' + value.municipio + '</option>');
                        });
                    }
                });
            }
        });
    });
</script> 




@endsection

       