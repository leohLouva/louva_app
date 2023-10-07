@extends('layouts.app')
@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
@section('main_container')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
            </div>
            <h4 class="header-title">Editar Trabajdor</h4>
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
        <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">Documentos</span>
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
            <div class="col-lg-7"> 
                <form action="fuerza-trabajo/editing" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">  
                            <div class="tab-content">
                                <div class="tab-pane show active" id="custom-styles-preview">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Nombre</label>
                                        <input type="text" class="form-control" name="txtName" id="txtName" placeholder="" value="{{$worker->name}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Apellido</label>
                                        <input type="text" class="form-control" name="txtLastName" id="txtLastName" placeholder="" value="{{$worker->lastName}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Contratista</label>
                                        <select class="form-control select2" data-toggle="select2" id="contratista">
                                            @foreach ($contractors as $contractor)
                                                <option value="{{$contractor->idContractor}}" {{ $worker->idContractor_contractors == $contractor->idContractor ? 'selected' : '' }}>{{$contractor->contractorName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Puesto</label>
                                        <select class="form-control select2" data-toggle="select2" id="puesto">
                                            @foreach ($jobs as $job)
                                                <option value="{{$job->idJob}}" {{ $worker->idJob_jobs == $job->idJob ? 'selected' : '' }}>{{$job->jobName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Número de Seguro Social</label>
                                        <input type="text" class="form-control" name="nss" id="nss" placeholder="" value="{{$worker->nss}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Número de Registro Patronal</label>
                                        <input type="text" class="form-control" name="nrp" id="nrp" placeholder="" value="{{$worker->nss}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Teléfono Personal</label>
                                        <input type="text" class="form-control" name="telP" id="telP" placeholder="" value="{{$worker->personalPhone}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Teléfono de Emergencia</label>
                                        <input type="text" class="form-control" name="telE" id="telE" placeholder="" value="{{$worker->emergencyPhone}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Tipo de Sangre</label>
                                        <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" placeholder="" value="{{$worker->blodType}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Enfermedades Crónicas</label>
                                        <input type="text" class="form-control" name="enfermedadesCronicas" id="enfermedadesCronicas" placeholder="" value="{{$worker->chronicDiseases}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Alergias</label>
                                        <input type="text" class="form-control" name="alergias" id="alergias" placeholder="" value="{{$worker->alergies}}" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        
                                        <input type="hidden" name="flImage" value="{{$worker->imgWorker}}"><br>
                                        <input type="hidden" name="folderName" id="folderName" value="{{$worker->folderName}}"><br>
                                        <input type="hidden" name="foldeNameWorker" value="{{$worker->foldeName}}"><br>
                                        <input type="hidden" name="qrCode" value="{{$worker->isValidated}}">
                                        
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary" >
                                            Editar trabajador
                                        </button>
                                    </div>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </form>
            </div>
        
            <div class="col-lg-5">
                <div class="card" id="credencialTrabajadorDelantera">
                    <div class="card-body">
                        <h4 class="mt-3 my-1">No. Serial: {{$worker->idIntern_worker}}</h4>            
                        <!--<button type="button" class="btn btn-outline-primary" onclick="printCard()"><i class="mdi mdi-print text-primary"></i> Imprimir</button>-->
                        <div class="text-center">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset("uploads/contratista/{$worker->folderName}/{$worker->foldeName}/{$worker->imgWorker}") }}" class="avatar-lg rounded-5" alt="friend">
                                </div>
                            </div>
                            <h4 class="mt-3 my-1">Empresa: {{$worker->contractorName}}</h4>
                            <h5 class="mt-3 my-1">Nombre: {{$worker->lastName}} {{$worker->name}} 
                                
                                <!--    <i class="mdi mdi-alert-decagram text-danger"></i>
                                
                                    <i class="mdi mdi-check-decagram text-success"></i>-->
                                
                                
                            </h4>
                            <p class="mb-0 text-muted">Puesto:  {{$worker->jobName}}</p>
                            <hr class="bg-dark-lighten my-3">
                            <div class="visible-print text-center">
                                {!! QrCode::size(150)->generate(route('fuerza-trabajo.editar-trabajador.show', ['id' => $worker->id])); !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card" id="credencialTrabajadorTrasera">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-6">                                        
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="mdi mdi-cancel"></i></li>
                                            <li class="list-group-item"><i class="mdi mdi-cancel"></i></li>
                                            <li class="list-group-item"><i class="mdi mdi-cancel"></i></li>
                                        </ul>
                                </div>

                                <div class="col-6">
                                    {!! QrCode::size(150)->generate(route('fuerza-trabajo.editar-trabajador.show', ['id' => $worker->id])); !!}
                                </div>
                            </div>
                            <hr class="bg-dark-lighten my-3">                                
                        </div>   
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td>NSS: </td>
                                <td><b>{{$worker->nss}}</b></td>
                            </tr>
                            <tr>
                                <td>RPNSS: </td>
                                <td><b>{{$worker->nrp}}</b></td>
                            </tr>
                            <tr>
                                <td>CONTACTO: </td>
                                <td><b>{{$worker->personalPhone}}</b></td>
                            </tr>
                            <tr>
                                <td>TIPO DE SANGRE: : </td>
                                <td><b>{{$worker->blodType}}</b></td>
                            </tr>
                            <tr>
                                <td>ALERGIAS: </td>
                                <td><b>{{$worker->alergies}}</b></td>
                            </tr>
                            <tr>
                                <td>ENFERMEDADES CRÓNICAS: </td>
                                <td><b>{{$worker->chronicDiseases}}</b></td>
                            </tr>
                            </tbody>
                        </table> 
                        <div class="text-center">
                            <br><br><br>
                            _____________________ <br>
                            FIRMA DE AUTORIZACIÓN
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
   
    <div class="tab-pane fade" id="profile">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">            
                        
                        @if($worker->isValidated == 0 || $worker->isValidated == "")
                            <i class="mdi mdi-alert-decagram text-danger"></i>
                        @else
                            <i class="mdi mdi-check-decagram text-success"></i>
                        @endif
                        <form action="/pdfs" method="post" enctype="multipart/form-data" class="my-form" id="my-form">
                            @csrf
                        
                            <h1>Subir Archivos</h1>
        
        
                            <div class="mb-3">
                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="file"></label>
                                <button type="submit" class="btn btn-primary">Subir Documentos:</button>
                            </div>
                        
                        <input type="hidden" class="form-control" id="workerId" name="workerId" value="{{ $worker->id }}">
                        <input type="hidden" class="form-control" id="flImage" name="flImage" value="{{ $worker->imgWorker }}">
                        <input type="hidden" class="form-control" id="folderNameCont" name="folderNameCont" value="{{ $worker->folderName }}">
                        <input type="hidden" class="form-control" id="foldeNameWorker" name="foldeNameWorker" value="{{ $worker->foldeName }}"> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"> 
                        <h2>Archivos existentes:</h2>
                        @foreach($documents as $document)
                            <div class="document-preview">
                                <h4>{{ $document->path }}</h4>
                                <iframe src="{{ asset('storage/uploads/contratista/'. $worker->folderName .'/' .$worker->foldeName.'/'. $document->path) }}" width="700" height="500"></iframe>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="validate">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Files</h5>
                <form action="{{route('validateDocuments')}}" method="POST">
                    @csrf
                    @foreach($documents as $document)
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
@endsection
