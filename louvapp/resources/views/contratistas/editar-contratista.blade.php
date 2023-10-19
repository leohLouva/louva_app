@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
<script src="{{ asset("/assets/js/views/empresa.js") }}"></script>


@section('main_container')
<script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
            </div>
            <h4 class="header-title">Detalle de la empresa</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="/contratista/editando-contratista/{{$contractor->idContractor}}" method="POST" id="editContractor">
            @csrf
        <div class="card">
            <div class="card-body">            
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" value="{{$contractor->contractorName}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Registro Federal del Contribuyente</label>
                    <input type="text" class="form-control" name="rfc" id="rfc" value="{{$contractor->rfcContractor}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Proyecto</label>
                    <select class="form-control select2" data-toggle="select2" name="nombreProyecto" id="nombreProyecto">
                        <option value="0">Selecciona una Proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{$project->id}}">{{$project->projectName}}</option>
                            <option value="{{$project->id}}"@if ($project->id == $contractor->idProject_project) selected @endif>{{$project->projectName}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="validationCustomUsername">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend"value="{{$contractor->emailContractor}}" >
                    
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="validationCustom03">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{$contractor->phoneContractor}}">
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">Sitio web</label>
                    <input type="text" class="form-control" name="web" id="web" value="{{$contractor->sitio_web}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Actividad</label>
                    <input type="text" class="form-control" name="actividad" id="actividad" value="{{$contractor->actividad}}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">            
                <div class="mb-3">
                    <label class="form-label">Domicilio</label>
                    <input type="text" class="form-control" name="domicilio" id="domicilio" value="{{$contractor->domicilioContractor}}" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="cp" id="cp" value="{{$contractor->codigoPostalContractor}}">
                </div>
                <div class="mb-3">    
                    <label class="form-label">Estado</label>
                    <select class="form-control select2" data-toggle="select2" id="estado" name="estado">
                        <option value="0">Selecciona un estado</option>
                        @foreach ($states as $state)
                            <option value="{{$state->idEstado}}"@if ($state->idEstado == $contractor->idEstado_estado) selected @endif>{{$state->estado}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="mb-3">
                    <label class="form-label">Municipio</label>
                    <select class="form-control select2" data-toggle="select2" id="municipio" name="municipio">
                        <option value="{{$contractor->idMunicipio_municipio}}">{{$contractor->municipio}}</option>

                    </select>
                </div> 
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="folderName" name="folderName" value="{{$contractor->folderName}}">
                    <input type="hidden" class="form-control" name="flImage" id="flImage" value="{{$contractor->img_contractor}}">
                    
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" onclick="editarEmpresa()" >
                        Editar Empresa
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">            
                <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                <form action="{{ route('imagenes.storeContractor')}}" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col-justify-center items-center" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <input type="hidden" name="nombreEmpresaF" id="nombreEmpresaF" value="{{$contractor->contractorName}}" />
                <input type="hidden" name="typeOfView" value="empresa">
                    <div class="fallback">
                        <input name="fileContractor" type="file" />
                    </div>
                    <div class="dz-message needsclick">
                        <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                        <h4>Arrastra y Suelta los archivos aquí o haz clic para cargarlos.</h4>
                    </div>
                </form>                                                    
                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#estado').on('change', function() {
            var estadoId = $(this).val();
            if (estadoId > 0) {
                $.ajax({
                    url: '/municipios/' + estadoId,
                    type: 'GET',
                    success: function(data) {
                        var locacionSelect = $('#municipio');
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
    document.getElementById("nombreEmpresa").oninput = () => {

        const input = document.getElementById('nombreEmpresa');
        const output = document.getElementById('nombreEmpresaF');

  output.value = input.value;
};
</script>

@endsection