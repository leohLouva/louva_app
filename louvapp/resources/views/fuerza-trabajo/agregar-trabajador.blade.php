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
        <div class="card" id="imgProfileTrabajador" style="display:none;">
            <div class="card-body">            
                        <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                        <form action="{{ route('imagenes.storeImgProfileWorker')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                        @csrf
                        <input type="hidden" name="idContractor" id="idContractor" value="" disabled>
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                                <h4>Agrega una imagen del trabajador</h4>
                                <h6>Recuerda elegir un contratista antes de subir una imagen</h6>
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
                <div class="card-body">  
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom01">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="" required>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom02">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" value="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom02">Contratista</label>
                        <select name="contratista" id="contratista" class="form-select mb-3" required>
                            <option value="0">Elige uno</option>
                            @foreach ($contractors as $contractor)
                                <option value="{{$contractor->idContractor}}">{{$contractor->contractorName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom02">Puesto</label>
                        <select name="puesto" id="puesto" class="form-select mb-3" required>
                            <option value="">Elige uno</option>
                            @foreach ($jobs as $job)
                                <option value="{{$job->idJob}}"}>{{$job->jobName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom03">Número de Seguro Social</label>
                        <input type="text" class="form-control" name="nss" id="nss" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom03">Número de Registro Patronal</label>
                        <input type="text" class="form-control" name="nrp" id="nrp" placeholder="" required>
                    </div>     
                    
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-6">
            <div class="card">
                <div class="mb-3">
                    <input type="hidden" name="flImage" id="flImage" value="" >
                    <input type="hidden" id="folderName" name="folderName" value="" >

                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom010">Teléfono Personal</label>
                        <input type="text" class="form-control" name="telefonoPersonal" id="telefonoPersonal" placeholder="" value="" required>
                        
                    </div>   
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom010">Teléfono de emergencia</label>
                        <input type="text" class="form-control" name="telefonoEmergencia" id="telefonoEmergencia" placeholder="" value="" required>
                        
                    </div>    
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom010">Tipo de sangre</label>
                        <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" placeholder="" value="" required>
                        
                    </div>        
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom010">Enfermedades crónicas</label>
                        <input type="text" class="form-control" name="enfermedades" id="enfermedades" placeholder="" value="" required>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom010">Alergias</label>
                        <input type="text" class="form-control" name="alergias" id="alergias" placeholder="" value="" required>
                        
                    </div>                                         
                    
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" onclick="agregarTrabajador()" >
                            Agregar trabajador
                        </button>
                    </div>
                </div>
            </div>
        </form>
        </div>
</div>

@endsection
