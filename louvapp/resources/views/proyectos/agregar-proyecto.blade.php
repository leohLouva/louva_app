@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('main_container')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
                
            </div>
            <h4 class="header-title">Crear proyecto nuevo</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">            
                    <div class="tab-content">
                        <div class="tab-pane show active" id="custom-styles-preview">
                            <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                            <label for="projectname" class="form-label">Logo</label>
                            <input type="hidden" name="hdnType" value="proyecto">
                            <form action="{{ route('imagenes.store')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" />
                                </div>
                
                                <div class="dz-message needsclick">
                                    <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                                    <h4>Suelta los archivos aquí o haz clic para cargarlos.</h4>
                                </div>
                            </form>
                            <!-- Preview -->
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">            
                    <div class="tab-content">
                        <div class="tab-pane show active" id="custom-styles-preview">
                            <form action="/addingProject" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Nombre del proyecto</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="project-overview" class="form-label">Descripción del proyecto</label>
                                    <textarea class="form-control" name="description" id="description" rows="5" placeholder="" maxlength="140"></textarea>
                                </div>
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Fecha de inicio</label>
                                    <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true">
                                </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="flImage" value="">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary" >
                                            Crear Proyecto
                                        </button>
                                    </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->

    </div>
            
       

       

  

<!-- Bootstrap Datepicker Plugin js -->
<script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>






@endsection

       