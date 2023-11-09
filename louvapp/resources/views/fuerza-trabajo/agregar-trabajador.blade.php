@extends('layouts.app')
@section('main_container')
@push('js.app')
    @vite('resources/js/app.js')
@endpush
<script src="{{ asset("/assets/js/views/fuerza-trabajo.js") }}"></script>
                 
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
        <div class="col-6">
            <div class="card">
                <form action="/addingWorker" method="POST" id="formTrabajador">
                    @csrf
                <div class="card-body">  
                    <div class="mb-3">
                        <label class="form-label">NOMBRE</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">APELLIDO</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TIPO DE USUARIO</label>
                        <select class="form-select"  name="tipoUsuario" id="tipoUsuario" >
                            <option value="0">ELIGE UN TIPO DE USUARIO</option>
                            @foreach ($types as $type)
                                <option value="{{$type->idType}}">{{$type->typeName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NOMBRE DE USUARIO: (para sistema) </label>
                        <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" >
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
                            <input type="password" id="confirmPassword" class="form-control" >
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CORREO</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" id="correo" placeholder="" aria-describedby="inputGroupPrepend">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">CURP</label>
                        <input type="text" class="form-control" name="curp" id="curp" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">RFC</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NÚMERO DE SEGURO SOCIAL</label>
                        <input type="text" class="form-control" name="nss" id="nss" >
                    </div>   
                    
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">PROYECTO</label>
                        <select class="form-control select2" data-toggle="select2" name="idProyecto" id="idProyecto">
                            <option value="0">SELECCIONA UN PROYECTO</option>
                            @foreach ($projects as $project)
                                <option value="{{$project->idProject}}">{{$project->projectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CONTRATISTA</label>
                        <select name="contratista" id="contratista" class="form-select mb-3">
                            <option value="0">ELIGE UNO</option>
                            @foreach ($contractors as $contractor)
                                <option value="{{$contractor->idContractor}}">{{$contractor->contractorName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PUESTO</label>
                        <select name="puesto" id="puesto" class="form-select mb-3">
                            <option value="0">ELIGE UNO</option>
                            @foreach ($jobs as $job)
                                <option value="{{$job->idJob}}"}>{{$job->jobName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TELÉFONO PERSONAL</label>
                        <input type="text" class="form-control" name="telefonoPersonal" id="telefonoPersonal" >
                    </div>   
                    <div class="mb-3">
                        <label class="form-label">TELÉFONO DE EMERGENCIA</label>
                        <input type="text" class="form-control" name="telefonoEmergencia" id="telefonoEmergencia" >
                    </div>    
                    <div class="mb-3">
                        <label class="form-label">TIPO DE SANGRE</label>
                        <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" >
                    </div>        
                    <div class="mb-3">
                        <label class="form-label">ENFERMEDADES CRÓNICAS</label>
                        <input type="text" class="form-control" name="enfermedades" id="enfermedades" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ALERGIAS</label>
                        <input type="text" class="form-control" name="alergias" id="alergias" >
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
