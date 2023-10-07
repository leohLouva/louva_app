@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush

@section('main_container')
<script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
            </div>
            <h4 class="header-title">Agrega un contratista nuevo</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
    <form action="/addingContractor" method="POST">
            @csrf
        <div class="card">
            <div class="card-body">            
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                        <div class="tab-pane show active" id="custom-styles-preview">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" name="contractorName" id="contractorName"  placeholder="" value="" required>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Id Interno</label>
                                <input type="text" class="form-control" name="idIntern" id="idIntern" placeholder="" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Proyecto</label>
                                <select class="form-control select2" data-toggle="select2" name="projectRelation">
                                    <option>Selecciona una opción</option>
                                    <option value="1">Torre de prueba</option>
                                    <option value="2">Torre art</option>
                                    <option value="3">una mas</option>
                                    <option value="4">Proyecto nuevo</option>
                                    <option value="5">proy</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" name="email" id="email" placeholder=""
                                        aria-describedby="inputGroupPrepend" required>
                                
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">Teléfono</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="" required>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Whatsapp</label>
                                <input type="text" class="form-control" name="whats" id="txtUserName" placeholder="" value="" required>
                                
                                
                            </div>
                            <div class="mb-3">
                                <input type="hidden" id="folderName" value="">
                                <input type="text" class="form-control" name="flImage" value="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" >
                                    Agregar Proyecto
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div><!--end card-->
    </form>
    </div><!--end col-12-->
</div><!--end row-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">            
                <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                <form action="{{ route('imagenes.storeContractor')}}" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col-justify-center items-center" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <input id="nameOfContractor" type="text" value="" />
                <input type="hidden" name="typeOfView" value="contratista">

                    <div class="fallback">
                        <input name="fileContractor" type="file" />
                        
                    </div>

                    <div class="dz-message needsclick">
                        <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                        <h4>Arrastra y Suelta los archivos aquí o haz clic para cargarlos.</h4>
                    </div>
                </form>                                                    
                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("contractorName").oninput = () => {
        const input = document.getElementById('contractorName');
        const output = document.getElementById('nameOfContractor');

  output.value = input.value;
};
</script>
@endsection