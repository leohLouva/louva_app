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
            <h4 class="header-title">Agrega una empresa nueva</h4>
        </div>
    </div>
</div>

<div class="row">
           
        <div class="col-6">
            <form action="/addingContractor" method="POST" id="addContractor">
                @csrf
            <div class="card">
                <div class="card-body">            
                    <div class="mb-3">
                        <label class="form-label">NOMBRE DEL CONTRATISTA</label>
                        <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">REGISTRO FEDERAL DEL CONTRIBUYENTE</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" oninput="this.value = this.value.toUpperCase()" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustomUsername">EMAIL</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend" >
                        
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom03">TELÉFONO</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" oninput="this.value = this.value.toUpperCase()">
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SITIO WEB</label>
                        <input type="text" class="form-control" name="web" id="web" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ACTIVIDAD</label>
                        <input type="text" class="form-control" name="actividad" id="actividad" oninput="this.value = this.value.toUpperCase()">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">     
                    <div class="mb-3">
                        <label class="form-label">PROYECTO</label>
                        <select class="form-control select2" data-toggle="select2" name="idProyecto" id="idProyecto" >
                            <option value="0">SELECCIONA UN PROYECTO</option>
                            @foreach ($projects as $project)
                                <option value="{{$project->idProject}}">{{strtoupper($project->projectName)}}</option>
                            @endforeach
                        </select>
                    </div>       
                    <div class="mb-3">
                        <label class="form-label">DOMICILIO</label>
                        <input type="text" class="form-control" name="domicilio" id="domicilio" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CÓDIGO POSTAL</label>
                        <input type="text" class="form-control" name="cp" id="cp" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">    
                        <label class="form-label">ESTADO</label>
                        
                        <select class="form-control select2" data-toggle="select2" id="estado" name="estado" onchange="getLocation()" oninput="convertirAMayusculas(this)">

                            <option value="0">SELECCIONA UN ESTADO</option>
                            @foreach ($states as $state)
                                <option value="{{$state->idEstado}}">{{strtoupper($state->estado)}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label">MUNICIPIO</label>
                        <select class="form-control select2" data-toggle="select2" id="location" name="location" >
                            <option value="0">ELIGE UN MUNICIPIO SEGÚN EL ESTADO</option>
                        </select>
                    </div> 
                    <div class="mb-3">

                        <input type="hidden" class="form-control" name="flImage" id="flImage" value="">
                        
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" onclick="agregarEmpresa()" >
                            AGREGAR CONTRATISTA
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
                <p class="text-muted font-14">EL TAMAÑO DE IMAGEN RECOMENDADO 800x400 (px).</p>
                <form action="{{ route('imagenes.storeContractor')}}" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col-justify-center items-center" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <input type="hidden" name="nombreEmpresaF" id="nombreEmpresaF" value="" />
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


@endsection