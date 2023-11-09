@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
<script src="{{ asset("/assets/js/views/contractor.js") }}"></script>


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
    <div class="col-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="header-title">{{$contractor->contractorName}}</h4>
            </div>
            <div class="card-body pt-0">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="card-img-top" src="{{ asset("uploads/empresa/$contractor->folderName/$contractor->img_contractor") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
                </div>
            </div> 
        </div>
        
    </div>
    <div class="col-4">
        <form action="/contratista/editando-contratista/{{$contractor->idContractor}}" method="POST" id="editContractor">
            @csrf
        <div class="card">
            <div class="card-body">            
                <div class="mb-3">
                    <label class="form-label">NOMBRE DEL CONTRATISTA</label>
                    <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" value="{{$contractor->contractorName}}" disabled oninput="convertirAMayusculas(this)" >
                </div>
                <div class="mb-3">
                    <label class="form-label">REGISTRO FEDERAL DEL CONTRIBUYENTE</label>
                    <input type="text" class="form-control" name="rfc" id="rfc" value="{{$contractor->rfcContractor}}" oninput="convertirAMayusculas(this)" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">PROYECTO</label>
                    <select class="form-control select2" data-toggle="select2" name="idProyecto" id="idProyecto" disabled>
                        <option value="0">SELECCIONA UN PROYECTO</option>
                        @foreach ($projects as $project)
                            <option value="{{$project->idProject}}"@if ($project->idProject == $contractor->idProyecto) selected @endif>{{strtoupper($project->projectName)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="validationCustomUsername">EMAIL</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend" value="{{$contractor->emailContractor}}" disabled>
                    
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="validationCustom03">TELÉFONO</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{$contractor->phoneContractor}}" disabled>
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">SITIO WEB</label>
                    <input type="text" class="form-control" name="web" id="web" value="{{$contractor->sitio_web}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">ACTIVIDAD</label>
                    <input type="text" class="form-control" name="actividad" id="actividad" value="{{$contractor->actividad}}" oninput="convertirAMayusculas(this)" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">            
                <div class="mb-3">
                    <label class="form-label">DOMICILIO FISCAL</label>
                    <input type="text" class="form-control" name="domicilio" id="domicilio" value="{{strtoupper($contractor->domicilioContractor)}}" oninput="convertirAMayusculas(this)" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">CÓDIGO POSTAL</label>
                    <input type="text" class="form-control" name="cp" id="cp" value="{{$contractor->codigoPostalContractor}}" oninput="convertirAMayusculas(this)" disabled>
                </div>
                <div class="mb-3">    
                    <label class="form-label">ESTADO</label>
                    <select class="form-control select2" data-toggle="select2" id="estado" name="estado" oninput="convertirAMayusculas(this)" disabled>
                        <option value="0">Selecciona un estado</option>
                        @foreach ($states as $state)
                            <option value="{{$state->idEstado}}"@if ($state->idEstado == $contractor->idEstado_estado) selected @endif>{{strtoupper($state->estado)}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="mb-3">
                    <label class="form-label">MUNICIPIO</label>
                    <select class="form-control select2" data-toggle="select2" id="municipio" name="municipio" oninput="convertirAMayusculas(this)" disabled>
                        <option value="{{$contractor->idMunicipio_municipio}}">{{strtoupper($contractor->municipio)}}</option>

                    </select>
                </div> 
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="folderName" name="folderName" value="{{$contractor->folderName}}">
                    <input type="hidden" class="form-control" name="flImage" id="flImage" value="{{$contractor->img_contractor}}">
                    
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-7">
                            <button type="button" class="btn btn-primary"  onclick="editarContractorON()" id="on-btn" style="display: block;" >EDITAR</button>
                            <button type="button" class="btn btn-primary" onclick="actualizarContractor()" id="guardar-btn" style="display: none;">ACTUALIZAR</button>        
                        </div>
                        <div class="col-5">
                            <button type="button" class="btn btn-danger" onclick="editarContractorOFF()" id="off-btn" style="display: none;">CANCELAR</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<div class="row" style="display:none;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">            
                <p class="text-muted font-14">EL TAMAÑO DE IMAGEN RECOMENDADO 800x400 (px).</p>
                <form action="{{ route('imagenes.storeContractor')}}" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col-justify-center items-center" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <input type="hidden" name="nombreEmpresaF" id="nombreEmpresaF" value="{{$contractor->contractorName}}" />
                <input type="hidden" name="typeOfView" value="empresa">
                    <div class="fallback">
                        <input name="fileContractor" type="file" />
                    </div>
                    <div class="dz-message needsclick">
                        <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                        <h4>ARRASTRA Y SUELTA LOS ARCHIVOS AQUÍ O HAZ CLIC PARA CARGARLOS.</h4>
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