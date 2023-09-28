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
            <h4 class="header-title">Editar proyecto </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">            
                    <div class="tab-content">
                        <div class="col-sm-12">
                            <div class="card">
                                @if ($projects && is_object($projects) && property_exists($projects, 'img_logo') && $projects->img_logo == NULL)
                                    
                                @elseif ($projects && is_object($projects) && property_exists($projects, 'img_logo'))
                                    <img src="{{ asset("uploads//$projects->img_logo") }}" class="card-img-top" style="height: 100px;" alt="avatar-2">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title"><a href="#" class="text-success stretched-link">{{ $projects->projectName}}</a></h5>
                                    <p class="card-text">
                                        {{$projects->description}}
                                    </p>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div>



                        <div class="tab-pane show active" id="custom-styles-preview" style="display:none;">
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
                            <form action="/editingProject/{{ $projects->id }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Nombre del proyecto</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{$projects->projectName}}">
                                </div>
                                <div class="mb-3">
                                    <label for="project-overview" class="form-label">Descripción del proyecto</label>
                                    <textarea class="form-control" name="description" id="description" rows="5" placeholder="" >{{$projects->description}}</textarea>
                                </div>
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Progreso del proyecto</label>    
                                    <!--<input data-toggle="touchspin" value="80" type="text" data-step="0.1" data-decimals="2" data-bts-postfix="%">-->
                                    
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{  $projects->progressPercentage }}%;" aria-valuenow="{{ $projects->progressPercentage }}" aria-valuemin="0" aria-valuemax="100">{{ $projects->progress }}%</div>
                                    </div>
                                </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="flImage" value="">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary" >
                                            Editar Proyecto
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

       