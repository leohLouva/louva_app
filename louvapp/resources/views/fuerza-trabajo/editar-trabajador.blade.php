@extends('layouts.app')
@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
@section('main_container')
<script src="{{ asset("/assets/js/views/fuerza-trabajo.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
@php
    $today = now();
@endphp
<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
            </div>
            
            <h4 class="header-title">Detalles </h4>
            <h5 class="header-title"></h5>
            
        </div>
    </div>
</div>
                                                   
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block">Información básica</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#uploadsDocuments" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">Subir Documentos</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#uploaded" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">Documentos subidos</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#validate" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">Validar</span>
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="home">
        <div class="row">
                <div class="col-lg-4"> 
                    <div class="card">
                        <div class="card-body"> 
                            <form action="/fuerza-trabajo/editar-trabajador/editing/{{$arrayWorker['worker']->idWorker}}" method="POST" name="editForm" id="editForm">
                                @csrf

                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{$arrayWorker['worker']->name}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" value="{{$arrayWorker['worker']->lastName}}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo de Usuario</label>
                                <select class="form-select"  name="tipoUsuario" id="tipoUsuario" >
                                    <option value="0">Elige uno</option>
                                    @foreach ($arrayWorker['types'] as $type)
                                        <option value="{{$type->idType}}"@if ($type->idType == $arrayWorker['worker']->idType_user_type) selected @endif>{{$type->typeName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombre de usuario: (para sistema) </label>
                                <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" value="{{$arrayWorker['worker']->userName}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" value="{{$arrayWorker['worker']->password}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">CURP</label>
                                <input type="text" class="form-control" name="curp" id="curp" value="{{$arrayWorker['worker']->curp}}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Registo Federal del Contribuyente</label>
                                <input type="text" class="form-control" name="rfc" id="rfc" value="{{$arrayWorker['worker']->rfc}}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Número de Seguro Social</label>
                                <input type="text" class="form-control" name="nss" id="nss" value="{{$arrayWorker['worker']->nss}}">
                            </div>   
                            <div class="mb-3">
                                <label class="form-label">Correo</label>
                                <input type="text" class="form-control" name="correo" id="correo" value="{{$arrayWorker['worker']->email}}" >
                            </div>
                            <input type="hidden" name="flImage" value="{{$arrayWorker['worker']->imgWorker}}"><br>
                            <input type="hidden" name="folderName" id="folderName" value="{{$arrayWorker['worker']->folderName}}"><br>
                            <input type="hidden" name="foldeNameWorker" value="{{$arrayWorker['worker']->foldeName}}"><br>
                            <input type="hidden" name="qrCode" value="">

                            
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Proyecto</label>
                                
                                <select class="form-control select2" data-toggle="select2" name="nombreProyecto" id="nombreProyecto">
                                    <option value="0">Selecciona un proyecto</option>
                                    
                                    @foreach ($arrayWorker['projects'] as $project)
                                        <option value="{{$project->id}}"@if ($project->id == $arrayWorker['worker']->idProyecto) selected @endif>{{$project->projectName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contratista</label>
                                <select name="contratista" id="contratista" class="form-select mb-3">
                                    <option value="0">Elige uno</option>
                                    @foreach ($arrayWorker['contractors'] as $contractor)
                                    <option value="{{$type->idType}}" @if ($type->idType == $arrayWorker['worker']->idType_user_type) selected @endif>{{$type->typeName}}</option>
                                        <option value="{{$contractor->idContractor}}" @if ($contractor->idContractor == $arrayWorker['worker']->idContractor_contractors) selected @endif>{{$contractor->contractorName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Puesto</label>
                                <select name="puesto" id="puesto" class="form-select mb-3">
                                    <option value="0">Elige uno</option>
                                    @foreach ($arrayWorker['jobs'] as $job)
                                        <option value="{{$job->idJob}}"}  @if ($job->idJob == $arrayWorker['worker']->idJob_jobs) selected @endif>{{$job->jobName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono Personal</label>
                                <input type="text" class="form-control" name="telefonoPersonal" id="telefonoPersonal" value="{{$arrayWorker['worker']->personalPhone}}">
                            </div>   
                            <div class="mb-3">
                                <label class="form-label">Teléfono de emergencia</label>
                                <input type="text" class="form-control" name="telefonoEmergencia" id="telefonoEmergencia" value="{{$arrayWorker['worker']->emergencyPhone}}" >
                            </div>    
                            <div class="mb-3">
                                <label class="form-label">Tipo de sangre</label>
                                <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" value="{{$arrayWorker['worker']->blodType}}">
                            </div>        
                            <div class="mb-3">
                                <label class="form-label">Enfermedades crónicas</label>
                                <input type="text" class="form-control" name="enfermedades" id="enfermedades" value="{{$arrayWorker['worker']->chronicDiseases}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alergias</label>
                                <input type="text" class="form-control" name="alergias" id="alergias" value="{{$arrayWorker['worker']->alergies}}">
                            </div> 
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" onclick="editarTrabajador()" >
                                    Editar 
                                </button>
                            </div>                                        
                        </form>
                        </div>
                    </div>
                </div>
            
            <div class="col-lg-4 printable-content">
                <div class="card printable-content" id="credencialTrabajadorDelantera">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset("uploads/empresa/{$arrayWorker['worker']->folderName}/{$arrayWorker['worker']->foldeName}/{$arrayWorker['worker']->imgWorker}") }}" class="avatar-lg rounded-5" alt="friend">
                                </div>
                            </div>
                            <h4 class="mt-3 my-1"></h4>            
                            <p class="mb-0 text-muted"><h4 class="mt-3 my-1">{{$arrayWorker['worker']->contractorName}}</h4></P>
                            <p class="mb-0 text-muted"><h4 class="mt-3 my-1">{{$arrayWorker['worker']->projectName}}</h4></P>
                            <p class="mb-0 text-muted"><h5 class="mt-3 my-1">NOMBRE: {{$arrayWorker['worker']->lastName}} {{$arrayWorker['worker']->name}} </h5></P>
                            <p class="mb-0 text-muted"><h6 class="mt-3 my-1">RFC: {{ strtoupper($arrayWorker['worker']->rfc) }} </h6></P>
                            <p class="mb-0 text-muted"><h6 class="mt-3 my-1">NSS: {{ strtoupper($arrayWorker['worker']->nss) }} </h6></P>
                            <p class="mb-0 text-muted">PUESTO:  {{$arrayWorker['worker']->jobName}}</p>
                            <hr class="bg-dark-lighten my-3">
                            <div class="visible-print text-center">
                                {!! QrCode::size(150)->generate(route('scanner.show', ['date' => $today->format('d-m-Y'),'id' => $arrayWorker['worker']->idWorker])); !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="uploadsDocuments">
        <div class="row">
            <div class="col-12">
                <div class="card" id="imgProfileTrabajador" style="">
                    <div class="card-body">            
                        <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                            <form action="{{ route('imagenes.storeImgProfileWorker')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                @csrf
                                <input type="hidden" class="form-control" type="text" name="idContractor" id="idContractor" value="{{$arrayWorker['worker']->idContractor_contractors}}" >
                                <input type="hidden" class="form-control" type="text" id="folderTrabajador" name="folderTrabajador" value="{{$arrayWorker['worker']->foldeName}}">
                                <input type="hidden" class="form-control" id="folderNameCont" name="folderNameCont" value="{{ $arrayWorker['worker']->folderName }}">
                                <input type="hidden" class="form-control" id="idWorker_" name="idWorker_" value="{{ $arrayWorker['worker']->idWorker }}">

                                <div class="fallback">
                                    <input name="file" type="file" />
                                </div>
                                <div class="dz-message needsclick">
                                    <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                                    <h5>Agrega una imagen del trabajador</h5>
                                </div>
                            </form>                                                    
                        <!-- Preview -->
                        <div class="dropzone-previews mt-3" id="file-previews"></div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($arrayWorker['aDocuments'] as $adocument)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body"> 
                            
                            <form action="/pdfs" method="post" enctype="multipart/form-data" class="my-form" id="my-form">
                                @csrf
                                    <h4>Subir {{$adocument->typeNme}}:</h4>
                                    <div class="mb-3">
                                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="file[]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="file"></label>
                                        <button type="submit" class="btn btn-primary">Subir Documento</button>
                                    </div>
                                    <input type="hidden" class="form-control" id="workerId" name="workerId" value="{{ $arrayWorker['worker']->idWorker }}">
                                    <input type="hidden" class="form-control" id="flImage" name="flImage" value="{{ $arrayWorker['worker']->imgWorker }}">
                                    <input type="hidden" class="form-control" id="folderNameCont" name="folderNameCont" value="{{ $arrayWorker['worker']->folderName }}">
                                    <input type="hidden" class="form-control" id="foldeNameWorker" name="foldeNameWorker" value="{{ $arrayWorker['worker']->foldeName }}"> 
                                    <input type="hidden" class="form-control" id="documentType" name="documentType" value="{{$adocument->idDocument}}"> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        @endforeach

    </div>

    <div class="tab-pane fade" id="uploaded">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"> 
                        <h3>Documentos agregados:</h3>
                        
                        @foreach($arrayWorker['documents'] as $document)
                            <div class="document-preview">
                                <h5>{{ $document->typeNme }}</h5>
                                <iframe src="{{ asset('storage/uploads/contratista/'. $arrayWorker['worker']->folderName .'/' .$arrayWorker['worker']->foldeName.'/'. $document->path) }}" width="700" height="500"></iframe>
                            </div>
                            <form action="{{ route('eliminarArchivo', $document->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="folderContractor" value="{{$arrayWorker['worker']->folderName}}">
                                <input type="hidden" name="folderWorker" value="{{$arrayWorker['worker']->foldeName}}">
                                <input type="hidden" name="path" value="{{$document->path}}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="validate">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Documentos a validar {{$arrayWorker['tusDocumentos']}} de {{$arrayWorker['totalDocumentos']}}</h4>
                <form action="{{route('validateDocuments')}}" method="POST">
                    @csrf
                    @foreach($arrayWorker['documents'] as $document)
                    <div class="card mb-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded">
                                            Doc.
                                        </span>
                                    </div>
                                </div>
                                <div class="col ps-0">
                                    <p class="text-capitalize">{{$document->typeNme}}</p>
                                    <a href="javascript:void(0);" class="text-muted fw-bold">{{$document->path}}</a>
                                    <p class="mb-0"></p>
                                </div>
                                <div class="col-auto">
                                    <input type="checkbox" class="btn btn-link btn-lg text-mutede" name="validated[{{$document->id}}]" id="{{$document->id}}" @if($document->validated) checked @endif>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" >
                            Validar documentos
                        </button>
                    </div>
                </form>
            </div>
        </div>
  
    </div>
</div>
<script>
 
</script>
@endsection
