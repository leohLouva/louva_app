@extends('layouts.app')
@section('main_container')
@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
<script src="{{ asset("/assets/js/views/fuerza-trabajo.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
                 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box">                                    
                    <div class="page-title-right">
                    </div>
                    <h4 class="header-title">Agregar Trabajador</h4>
                </div>
            </div>
        </div>
       
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">            
                <p class="text-muted font-14">EL TAMAÑO DE IMAGEN RECOMENDADO 800x400 (px).</p>
                    <form action="{{ route('imagenes.storeImgProfileWorker')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                        @csrf
                        
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>
                        <div class="dz-message needsclick">
                            <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                            <h5>AGREGA UNA IMAGEN PARA EL PERFIL DEL TRABAJADOR</h5>
                        </div>
                    </form>                                                    
                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-6">
            <div class="card">
                <form action="/addingWorker" method="POST" id="formTrabajador">
                    @csrf
                <input type="hidden" class="form-control" id="flImage" name="flImage" value="" >
                <div class="card-body">  
                    <div class="mb-3">
                        <label class="form-label">NOMBRE</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">APELLIDO</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TIPO DE USUARIO</label>
                        <select class="form-select"  name="tipoUsuario" id="tipoUsuario" oninput="this.value = this.value.toUpperCase()">
                            <option value="0">ELIGE UN TIPO DE USUARIO</option>
                            @foreach ($types as $type)
                                <option value="{{$type->idType}}">{{strtoupper($type->typeName)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NOMBRE DE USUARIO: (PARA SISTEMA) </label>
                        <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">PASSWORD</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" >
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CONFIRMA EL PASSWORD</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="confirmPassword" class="form-control" onchange="validatePassword()">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CORREO</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" id="correo" placeholder="" aria-describedby="inputGroupPrepend" oninput="this.value = this.value.toLowerCase()">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CURP</label>
                        <input type="text" class="form-control" name="curp" id="curp" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">RFC</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NÚMERO DE SEGURO SOCIAL</label>
                        <input type="text" class="form-control" name="nss" id="nss" oninput="this.value = this.value.toUpperCase()">
                    </div>   
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">CONTRATISTA</label>
                        <select name="contratista" id="contratista" class="form-select mb-3" oninput="this.value = this.value.toUpperCase()" onchange="getProjects()">
                            <option value="0">ELIGE UNO</option>
                            @foreach ($contractors as $contractor)
                                <option value="{{$contractor->idContractor}}">{{strtoupper($contractor->contractorName)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">OBRA</label>
                        <select class="form-control select2" data-toggle="select2" name="idProyecto" id="idProyecto" oninput="this.value = this.value.toUpperCase()">
                            <option value="0">SELECCIONA UNA OBRA</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PUESTO</label>
                        <select name="puesto" id="puesto" class="form-select mb-3"oninput="this.value = this.value.toUpperCase()">
                            <option value="0">ELIGE UNO</option>
                            @foreach ($jobs as $job)
                                <option value="{{$job->idJob}}"}>{{strtoupper($job->jobName)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TELÉFONO PERSONAL</label>
                        <input type="text" class="form-control" name="telefonoPersonal" id="telefonoPersonal" oninput="this.value = this.value.toUpperCase()">
                    </div>   
                    <div class="mb-3">
                        <label class="form-label">TELÉFONO DE EMERGENCIA</label>
                        <input type="text" class="form-control" name="telefonoEmergencia" id="telefonoEmergencia" oninput="this.value = this.value.toUpperCase()">
                    </div>    
                    <div class="mb-3">
                        <label class="form-label">TIPO DE SANGRE</label>
                        <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" oninput="this.value = this.value.toUpperCase()">
                    </div>        
                    <div class="mb-3">
                        <label class="form-label">ENFERMEDADES CRÓNICAS</label>
                        <input type="text" class="form-control" name="enfermedades" id="enfermedades" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ALERGIAS</label>
                        <input type="text" class="form-control" name="alergias" id="alergias" oninput="this.value = this.value.toUpperCase()">
                    </div>                                         
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" onclick="agregarTrabajador()" >
                            AGREGAR TRABAJADOR
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var addingW = '{{ route('addingWorker') }}';
        </script>
    </form>
</div>

@endsection
