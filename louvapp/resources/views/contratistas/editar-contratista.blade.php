@extends('layouts.app')

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
                    <img class="card-img-top" src="{{ asset("uploads/contractors/$contractor->img_contractor") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
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
                    <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" value="{{$contractor->contractorName}}" disabled   oninput="this.value = this.value.toUpperCase()">
                </div>
                <div class="mb-3">
                    <label class="form-label">REGISTRO FEDERAL DEL CONTRIBUYENTE</label>
                    <input type="text" class="form-control" name="rfc" id="rfc" value="{{$contractor->rfcContractor}}"  disabled oninput="this.value = this.value.toUpperCase()">
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
                    <input type="text" class="form-control" name="actividad" id="actividad" value="{{$contractor->actividad}}"  disabled oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">            
                <div class="mb-3">
                    <label class="form-label">DOMICILIO FISCAL</label>
                    <input type="text" class="form-control" name="domicilio" id="domicilio" value="{{strtoupper($contractor->domicilioContractor)}}"  disabled oninput="this.value = this.value.toUpperCase()">
                </div>
                <div class="mb-3">
                    <label class="form-label">CÓDIGO POSTAL</label>
                    <input type="text" class="form-control" name="cp" id="cp" value="{{$contractor->codigoPostalContractor}}"  disabled oninput="this.value = this.value.toUpperCase()">
                </div>
                <div class="mb-3">    
                    <label class="form-label">ESTADO</label>
                    <select class="form-control select2" data-toggle="select2" id="estado" name="estado"  onclick="getLocation()" disabled oninput="this.value = this.value.toUpperCase()">
                        <option value="0">SELECCIONA UN ESTADO</option>
                        @foreach ($states as $state)
                            <option value="{{$state->idEstado}}"@if ($state->idEstado == $contractor->idEstado_estado) selected @endif>{{strtoupper($state->estado)}}</option>
                        @endforeach
                    </select>
                </div> 

                <div class="mb-3">
                    <label class="form-label">MUNICIPIO</label>
                    <select class="form-control select2" data-toggle="select2" id="location" name="location"   disabled oninput="this.value = this.value.toUpperCase()">
                        @foreach ($locations as $location)
                            <option value="{{$location->idMunicipio}}"@if ($location->idMunicipio == $contractor->idMunicipio_municipio) selected @endif>{{strtoupper($location->municipio)}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="flImage" id="flImage" value="{{$contractor->img_contractor}}">
                    
                </div>
            </form>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-7">
                            <button type="button" class="btn btn-primary" onclick="editarContractorON()" id="on-btn" style="display: block;">EDITAR</button>
                            <button type="button" class="btn btn-primary" onclick="actualizarContractor()" id="guardar-btn" style="display: none;">ACTUALIZAR</button>        
                        </div>
                        <div class="col-5">
                            <button type="button" class="btn btn-danger" onclick="editarContractorOFF()" id="off-btn" style="display: none;">CANCELAR</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection