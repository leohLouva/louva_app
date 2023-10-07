@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js.app')
    @vite('resources/js/app.js')
@endpush
@section('main_container')
<script src="{{ asset("/assets/js/views/usuarios.js") }}"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
            </div>
            <h4 class="header-title">Agrega un usuario nuevo</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">            
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                        <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>
                        <form action="{{ route('imagenes.storeUser')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                            @csrf
                            <input type="hidden" name="typeOfView" value="usuarios">

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
        <form action="/addingUser" method="POST" id="formUsuario">
            @csrf
        <div class="card">
            <div class="card-body">            
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nombre</label>
                            <input type="text" class="form-control" name="txtName" id="txtName" placeholder="" value="" required>
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom02">Apellido</label>
                            <input type="text" class="form-control" name="txtLastName" id="txtLastName" placeholder="" value="" required>
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom02">Nombre de usuario</label>
                            <input type="text" class="form-control" name="txtUserName" id="txtUserName" placeholder="" value="" required>
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustomUsername">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="" aria-describedby="inputGroupPrepend" required>
                               
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom03">Password</label>
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="" required>
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom03">Confirma Password</label>
                            <input type="password" class="form-control" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="" required>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom04">Puesto</label>
                            <select class="form-select mb-3" name="slcAccess" id="slcAccess">
                                <option value="0" selected>Elige una opción del menú</option>
                                <option value="1">Dirección Ggeneral</option>
                                <option value="2">Subdirección</option>
                                <option value="3">Dirección de proyectos</option>
                                <option value="4">Supervisión de obra</option>
                                <option value="5">Superintendente de obra</option>
                                <option value="6">Coordinador de obra</option>
                                <!--<option value="8">SysAdmin - Soporte</option>-->
                            </select>  
                            
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="flImage" value="">
                            <input type="hidden" id="folderName" value="">

                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" onclick="agregarUsuario()" >
                                Agregar usuario
                            </button>
                        </div>
                    </form>
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>



@endsection

       