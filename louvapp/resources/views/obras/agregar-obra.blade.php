@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
@section('main_container')
<script src="{{ asset("/assets/js/views/obra.js") }}"></script>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                
            </div>
            <h4 class="page-title">AGREGAR NUEVA OBRA </h4>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- start page form-create-project -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">            
                <p class="text-muted font-14">EL TAMAÑO DE IMAGEN RECOMENDADO 800x400 (px).</p>
                <label class="form-label">IMAGEN DEL PROYECTO</label>
                <input type="hidden" name="hdnType" value="proyecto">
                <form action="{{ route('imagenes.storeProject')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
                    <div class="dz-message needsclick">
                        <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                        <h4>SUELTA EL ARCHIVO AQUI O ARRASTRA PARA CARGARLOS</h4>
                    </div>
                </form>
                <div class="dropzone-previews mt-3" id="file-previews"></div>

                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">           
                <form action="/addingProyecto" method="POST" id="addingProyecto">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">TÍTULO DEL PROYECTO</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="" oninput="convertirAMayusculas(this)">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">DESCRIPCIÓN DEL PROYECTO</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="" maxlength="500" oninput="convertirAMayusculas(this)"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NOMBRE DEL DESARROLLADOR</label>
                        <select class="form-control select2" data-toggle="select2" id="desarrollador" name="desarrollador">
                            <option value="0">SELECCIONA UN DESARROLLADOR</option>
                            @foreach ($owners as $owner)
                                <option value="{{$owner->idUser}}">{{ strtoupper($owner->name)}} {{ strtoupper($owner->lastName)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">RESPONSABLE DE OBRA (DRO)</label>
                        <select class="form-control select2" data-toggle="select2" id="responsableObra" name="responsableObra">
                            <option value="0">SELECCIONA UN DRO</option>
                            @foreach ($reponsables as $reponsable)
                                <option value="{{$reponsable->idUser}}">{{  strtoupper($reponsable->name)}} {{ strtoupper($reponsable->lastName)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 position-relative" id="datepicker1">
                        <label class="form-label">FECHA DE INICIO DEL PROYECTO</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="ri-calendar-2-fill"></i></span>
                            <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" placeholder="" aria-describedby="inputGroupPrepend" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TIPO DE PROYECTO</label>
                        <select class="form-control select2" data-toggle="select2" id="tipoProyecto" name="tipoProyecto">
                            <option value="0">SELECCIONA UN TIPO DE PROYECTO</option>
                            @foreach ($project_types as $project_type)
                                <option value="{{$project_type->idProject_type}}">{{$project_type->nameProject_type}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">            
                    <div class="mb-3">
                        <label class="form-label">M<sup>2</sup> DE URBANIZACION</label>
                        <input type="number" id="mtsSuperficiales" name="mtsSuperficiales" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">M<sup>2</sup> SÓTANO</label>
                        <input type="number" id="mtsSotano" name="mtsSotano" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SISTEMA CONSTRUCTIVO ESTRUCTURAL</label>
                        <select class="form-control select2" data-toggle="select2" id="sistemaConstruccion" name="sistemaConstruccion">
                            <option value="0">SELECCIONA UNO DE LA LISTA </option>
                            @foreach ($systemConsts as $systemConst)
                                <option value="{{$systemConst->idConstruction_system}}">{{$systemConst->nameConstruction_system}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">COSTO TOTAL DE OBRA APROXIMADO</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">$</span>
                            <input type="text" class="form-control" name="totalCosto" id="totalCosto" placeholder="" aria-describedby="inputGroupPrepend">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DIRECCIÓN</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="DIRECCION CALLE, NUMERO COLONIA" oninput="convertirAMayusculas(this)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ESTADO</label>
                        <select class="form-control select2" data-toggle="select2" id="estado" name="estado" onchange="getLocation()">
                            <option value="0">SELECCIONA UN ESTADO</option>
                            @foreach ($states as $state)
                                <option value="{{$state->idEstado}}">{{strtoupper($state->estado)}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="mb-3">
                        <label class="form-label">LOCACIÓN</label>
                        <select class="form-control select2" data-toggle="select2" id="location" name="location">
                            <option value="0">ELIGE UN MUNICIPIO</option>
                        </select>
                    </div>   
               
                    <div class="mb-3">
                        <input class="form-control" type="hidden" id="flImage" name="flImage" value="">
                        <input class="form-control" type="hidden" name="folderName" id="folderName" value="NA">
                    </form>
                        <button type="button" class="btn btn-primary" onclick="agregarProyecto()" >
                            CREAR PROYECTO
                        </button>
                    </div>
            </div>
        </div>
    </div> <!-- end col-->
</div>
<!-- end page form-create-project -->
<!-- Bootstrap Datepicker Plugin js -->
<script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
<script>
    var addingProject = '{{ route('addingProject') }}';
</script>



@endsection

       