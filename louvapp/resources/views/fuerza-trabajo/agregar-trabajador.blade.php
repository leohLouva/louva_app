@extends('layouts.app')



@section('main_container')
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
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Usuario</label>
                        <select class="form-select"  name="tipoUsuario" id="tipoUsuario" >
                            <option value="0">Elige uno</option>
                            @foreach ($types as $type)
                                <option value="{{$type->idType}}">{{$type->typeName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre de usuario: (para sistema) </label>
                        <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirma Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" id="correo" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CURP</label>
                        <input type="text" class="form-control" name="curp" id="curp" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Registo Federal del Contribuyente</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de Seguro Social</label>
                        <input type="text" class="form-control" name="nss" id="nss" >
                    </div>   
                    
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Proyecto</label>
                        <select class="form-control select2" data-toggle="select2" name="idProyecto" id="idProyecto">
                            <option value="0">Selecciona un proyecto</option>
                            @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->projectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contratista</label>
                        <select name="contratista" id="contratista" class="form-select mb-3">
                            <option value="0">Elige uno</option>
                            @foreach ($contractors as $contractor)
                                <option value="{{$contractor->idContractor}}">{{$contractor->contractorName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puesto</label>
                        <select name="puesto" id="puesto" class="form-select mb-3">
                            <option value="0">Elige uno</option>
                            @foreach ($jobs as $job)
                                <option value="{{$job->idJob}}"}>{{$job->jobName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono Personal</label>
                        <input type="text" class="form-control" name="telefonoPersonal" id="telefonoPersonal" >
                    </div>   
                    <div class="mb-3">
                        <label class="form-label">Teléfono de emergencia</label>
                        <input type="text" class="form-control" name="telefonoEmergencia" id="telefonoEmergencia" >
                    </div>    
                    <div class="mb-3">
                        <label class="form-label">Tipo de sangre</label>
                        <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" >
                    </div>        
                    <div class="mb-3">
                        <label class="form-label">Enfermedades crónicas</label>
                        <input type="text" class="form-control" name="enfermedades" id="enfermedades" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alergias</label>
                        <input type="text" class="form-control" name="alergias" id="alergias" >
                    </div>                                         
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" onclick="agregarTrabajador()" >
                            Agregar Usuario
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
