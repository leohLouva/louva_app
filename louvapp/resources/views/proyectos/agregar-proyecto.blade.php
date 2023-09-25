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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="projectname" class="form-label">Nombre del proyecto</label>
                            <input type="text" id="projectname" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="project-overview" class="form-label">Descripción del proyecto</label>
                            <textarea class="form-control" id="project-overview" rows="5" placeholder=""></textarea>
                        </div>
                        
                        <!-- Date View -->
                        <div class="mb-3 position-relative" id="datepicker1">
                            <label class="form-label">Fecha de inicio</label>
                            <input type="text" class="form-control" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="flDoctos" value="">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" >
                                Crear Proyecto
                            </button>
                        </div>
                        

                    </div> <!-- end col-->

                    <div class="col-xl-6">
                        <div class="mb-3 mt-3 mt-xl-0">
                            <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                
                            <form action="{{ route('imagenes.store')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzoneProjects" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
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
                
                            <!-- file preview template -->
                            <div class="d-none" id="uploadPreviewTemplate">
                                <div class="card mt-1 mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                <p class="mb-0" data-dz-size></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                    <i class="ri-close-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end file preview template -->
                        </div>
                </div>
                <!-- end row -->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- Bootstrap Datepicker Plugin js -->
<script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("assets/vendor/dropzone/dropzone.js") }}"></script>





</form>


@endsection

       