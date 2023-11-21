@extends('layouts.app')

@section('main_container')

<script src="{{ asset("/assets/js/views/fuerza-trabajo.js") }}"></script>
@push('js.app')
    @vite('resources/js/app.js')
@endpush
@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
<script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>

@php
    $today = now();
@endphp
<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <!--<button type="button" class="btn btn-success">ACTIVO</button>
                    <button type="button" class="btn btn-danger" disabled>INACTIVO</button>-->
                  </div>
                  <div class="form-check form-switch">
                </div>
            </div>
            <h4 class="header-title">DETALLES </h4>
        </div>
    </div>
</div>
                                                   
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block">INFORMACIÓN BÁSICA</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#uploadsDocuments" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">SUBIR DOCUMENTOS</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#uploaded" data-bs-toggle="tab" aria-expanded="true" class="nav-link " onclick="cargarDocumentos()">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">DOCUMENTOS AGREGADOS</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#validate" data-bs-toggle="tab" aria-expanded="true" class="nav-link " onclick="getValidarDocumentos()" >
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">VALIDACIÓN DE DOCUMENTOS</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#ft-personal" data-bs-toggle="tab" aria-expanded="true" class="nav-link " onclick="" >
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">FUERZA DE TRABAJO</span>
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="home">
        <div class="row">
            <div class="col-lg-4"> 
                <div class="card">
                    <div class="card-body"> 
                        <form action="/fuerza-trabajo/editar-trabajador/editing/{{$arrayWorker['worker'][0]->idUser}}" method="POST" name="editForm" id="editForm">
                            @csrf
                        <div class="mb-3">
                            <label class="form-label">NOMBRE</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{strtoupper($arrayWorker['worker'][0]->name)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">APELLIDO</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" value="{{strtoupper($arrayWorker['worker'][0]->lastName)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">TIPO DE USUARIO</label>
                            <select class="form-select"  name="tipoUsuario" id="tipoUsuario" disabled oninput="this.value = this.value.toUpperCase()">
                                <option value="0">ELIGE UNO</option>
                                @foreach ($arrayWorker['types'] as $type)
                                    <option value="{{$type->idType}}"@if ($type->idType == $arrayWorker['worker'][0]->idType_user_type) selected @endif>{{strtoupper($type->typeName)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NOMBRE DE USUARIO (PARA SISTEMA) </label>
                            <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" value="{{strtoupper($arrayWorker['worker'][0]->userName)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CURP</label>
                            <input type="text" class="form-control" name="curp" id="curp" value="{{strtoupper($arrayWorker['worker'][0]->curp)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">RFC</label>
                            <input type="text" class="form-control" name="rfc" id="rfc" value="{{strtoupper($arrayWorker['worker'][0]->rfc)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NÚMERO DE SEGURO SOCIAL</label>
                            <input type="text" class="form-control" name="nss" id="nss" value="{{strtoupper($arrayWorker['worker'][0]->nss)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>   
                        <div class="mb-3">
                            <label class="form-label">CORREO</label>
                            <input type="hidden" name="flImage" value="{{$arrayWorker['worker'][0]->imgWorker}}" disabled oninput="this.value = this.value.toUpperCase()"><br>
                            <input type="hidden" name="qrCode" value="" disabled oninput="this.value = this.value.toUpperCase()">
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" name="correo" id="correo" value="{{strtolower($arrayWorker['worker'][0]->email)}}" disabled oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ACTUALIZAR PASSWORD </label>
                            <input type="checkbox" id="changePass" data-switch="primary" onchange="changePassword()"  disabled/>
                            <label for="changePass" data-on-label="SI" data-off-label="NO"></label><br>
                        </div>
                       
                   
                        
                                                                        
                    </div> 
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">CONTRATISTA</label>
                            <select name="contratista" id="contratista" class="form-select mb-3" disabled onchange="getProjects()">
                                <option value="0">ELIGE UNO</option>
                                @foreach ($arrayWorker['contractors'] as $contractor)
                                    <option value="{{$contractor->idContractor}}" @if ($contractor->idContractor == $arrayWorker['worker'][0]->idContractor_contractors) selected @endif>{{strtoupper($contractor->contractorName)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">OBRA</label>   
                            <select class="form-control select2" data-toggle="select2" name="idProyecto" id="idProyecto" disabled>
                                <option value="0">SELECCIONA UN PROYECTO</option>
                                @foreach ($arrayWorker['projects'] as $project)
                                    <option value="{{$project->idProject}}"@if ($project->idProject == $arrayWorker['worker'][0]->idProject_user) selected @endif>{{strtoupper($project->projectName)}}</option>
                                @endforeach
                            </select>

                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">PUESTO</label>
                            <select name="puesto" id="puesto" class="form-select mb-3" disabled>
                                <option value="0">ELIGE UNO</option>
                                @foreach ($arrayWorker['jobs'] as $job)
                                    <option value="{{$job->idJob}}"}  @if ($job->idJob == $arrayWorker['worker'][0]->idJob_jobs) selected @endif>{{strtoupper($job->jobName)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">TELÉFONO PERSONAL</label>
                            <input type="text" class="form-control" name="telefonoPersonal" id="telefonoPersonal" value="{{$arrayWorker['worker'][0]->personalPhone}} " disabled oninput="this.value = this.value.toUpperCase()">
                        </div>   
                        <div class="mb-3">
                            <label class="form-label">TELÉFONO DE EMERGENCIA</label>
                            <input type="text" class="form-control" name="telefonoEmergencia" id="telefonoEmergencia" value="{{$arrayWorker['worker'][0]->emergencyPhone}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>    
                        <div class="mb-3">
                            <label class="form-label">TIPO DE SANGRE</label>
                            <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" value="{{strtoupper($arrayWorker['worker'][0]->blodType)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>        
                        <div class="mb-3">
                            <label class="form-label">ENFERMEDADES CRÓNICAS</label>
                            <input type="text" class="form-control" name="enfermedades" id="enfermedades" value="{{strtoupper($arrayWorker['worker'][0]->chronicDiseases)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ALERGIAS</label>
                            <input type="text" class="form-control" name="alergias" id="alergias" value="{{strtoupper($arrayWorker['worker'][0]->alergies)}}" disabled oninput="this.value = this.value.toUpperCase()">
                        </div> 
                        <div class="row">
                            <div class="col-7">
                                <button type="button" class="btn btn-info" onclick="editarUsuarioON()" id="on-btn" style="display: block;">EDITAR</button>
                                <button type="button" class="btn btn-primary" onclick="actualizarUsuario()" id="guardar-btn" style="display: none;">GUARDAR</button>
                            </div>             
                            <div class="col-5">
                                <button type="button" class="btn btn-danger" onclick="editarUsuarioOFF()" id="off-btn" style="display: none;">CANCELAR</button>

                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" id="credencialTrabajadorDelantera">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-12">
                                    @if($arrayWorker['worker'][0]->imgWorker)
                                        <img src="{{ asset("uploads/user_profile/{$arrayWorker['worker'][0]->imgWorker}") }}" class="avatar-lg rounded-5" alt="IMG_USUARIO">
                                    @else
                                        <img src="{{ asset('uploads/user_sample.png') }}" class="avatar-lg rounded-5" alt="Imagen de reemplazo">
                                    @endif
                                </div>
                                <p class="mb-0 text-muted"><h5 class="mt-3 my-1">NOMBRE: {{$arrayWorker['worker'][0]->lastName}} {{$arrayWorker['worker'][0]->name}} <i class="mdi mdi-check-decagram text-success"></i></h5></P>
                            </div>
                            <p class="mb-0 text-muted"><h4 class="">{{$arrayWorker['worker'][0]->contractorName}}</h4></P>
                            <p class="mb-0 text-muted"><h4 class="">{{$arrayWorker['worker'][0]->projectName}}</h4></P>
                            <p class="mb-0 text-muted"><h6 class="">RFC: {{ strtoupper($arrayWorker['worker'][0]->rfc) }} </h6></P>
                            <p class="mb-0 text-muted"><h6 class="">NSS: {{ strtoupper($arrayWorker['worker'][0]->nss) }} </h6></P>
                            <p class="mb-0 text-muted">PUESTO:  {{strtoupper($arrayWorker['worker'][0]->jobName)}}</p>
                            <hr class="bg-dark-lighten my-3">
                            <div class="visible-print text-center">
                                {!! QrCode::size(150)->generate(route('scanner.show', ['date' => $today->format('d-m-Y'),'id' => $arrayWorker['worker'][0]->idUser])); !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
                <a href="{{ route('scanner.show', ['date' => $today->format('d-m-Y'), 'id' => $arrayWorker['worker'][0]->idUser]) }}" class="btn btn-success" role="button">VER CARD DE ENTRADA Y SALIDA</a>
                
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="uploadsDocuments">
        <div class="row">
            <div class="col-12">
                <div class="card" id="imgProfileTrabajador" style="">
                    <div class="card-body">            
                        <p class="text-muted font-14">AQUI PUEDES ACTUALIZAR LA IMÁGEN DEL USUARIO</p>
                            <form action="{{ route('imagenes.storeImgProfileWorkerUpdate')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                @csrf
                                <input type="hidden" class="form-control" type="text" name="idContractor" id="idContractor" value="{{$arrayWorker['worker'][0]->idContractor_contractors}}" >
                                <input type="hidden" class="form-control" id="folderNameCont" name="folderNameCont" value="{{ $arrayWorker['worker'][0]->folderName }}">
                                <input type="hidden" class="form-control" id="idWorker_" name="idWorker_" value="{{ $arrayWorker['worker'][0]->idUser }}">
        
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
        <div class="row" >
            <div class="col-12">
                <div class="card">
                    <div class="card-body"> 
                        
                        <form action="/uploadDocumentation" method="post" enctype="multipart/form-data" class="my-form" id="my-form">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">ELIGE UN TIPO DE DOCUMENTO A SUBIR</label> 
                                <select class="form-select"  name="typeOfDocument" id="typeOfDocument" oninput="this.value = this.value.toUpperCase()">
                                    <option value="0"></option>
                                    @foreach ($arrayWorker['aDocuments'] as $adocument)
                                        <option value="{{$adocument->idDocument_type}}">{{strtoupper($adocument->typeNme)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file[]">
                            </div>
                            <div class="mb-3">
                                <label for="file"></label>
                                <button type="button" class="btn btn-primary" onclick="uploadDocumentationWorker()">SUBIR DOCUMENTO</button>
                            </div>
                                <input type="hidden" class="form-control" id="workerId" name="workerId" value="{{ $arrayWorker['worker'][0]->idUser }}">
                                <input type="hidden" class="form-control" id="flImage" name="flImage" value="{{ $arrayWorker['worker'][0]->imgWorker }}">
                                <input type="hidden" class="form-control" id="contractorName" name="contractorName" value="{{ $arrayWorker['worker'][0]->contractorName}}">
                                <script>
                                    var uploadD = '{{ route('uploadDocumentation') }}';
                                </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="uploaded">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"> 
                        <h3>DOCUMENTOS AGREGADOS:</h3>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="validate">
        <div class="card">
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="tab-pane" id="ft-personal">
        <div class="card">
            <div class="card-body">
            </div>
        </div>
    </div>
</div>
<div id="update-pass-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/fuerza-trabajo/editar-trabajador/editPassword/{{$arrayWorker['worker'][0]->idUser}}" method="POST" name="actualizaPassword" id="actualizaPassword">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">NUEVO PASSWORD</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                <input type="password" class="form-control" name="password" id="password" value=""  autocomplete="new-password" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CONFIRMA NUEVO PASSWORD</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                <input type="password" id="confirmPassword" class="form-control" value="" onchange="validatePassword()" autocomplete="new-password1">
                            </div>
                        </div>  
                        <div class="mv-3">
                            <button type="button" id="btnUpdatePassword" class="btn btn-primary" onclick="updatePassword()" style="display:none;">ACTUALIZAR PASSWORD</button>
                        </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var idUser = {{ $arrayWorker['worker'][0]->idUser }};
    var editingW = '{{ route('editingWorker', ['idUser' => ':idUser']) }}'.replace(':idUser', idUser);
    var  obtenerDocumentos = '{{ route('obtenerDocumentos', ['idUser' => ':idUser']) }}'.replace(':idUser', idUser);
    var validateDoc = '{{ route('validateDoc', ['idUser' => ':idUser']) }}'.replace(':idUser', idUser);
    var actualiza  ='{{ route('actualizarEstadoDocumentos') }}';
    var editPassword = '{{ route('editPassword', ['idUser' => ':idUser']) }}'.replace(':idUser', idUser);


    var updatePassModal = document.getElementById('update-pass-modal');
    updatePassModal.addEventListener('hidden.bs.modal', function () {
        document.getElementById("changePass").checked = false;
    });
</script>
@endsection
