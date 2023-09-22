@extends('layouts.app')

<!-- Dropzone File Upload js -->
<script src="{{ asset("/assets/vendor/dropzone/min/dropzone.min.js") }}"></script>

<!-- init js -->
<script src="{{ asset("/assets/js/ui/component.fileupload.js") }}"></script>
@section('main_container')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">                                    
            <div class="page-title-right">
                
            </div>
            <h4 class="header-title">Agrega un usuario nuevo</h4>
            
        
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3 mt-3 mt-xl-0">
            <label for="projectname" class="mb-0">Avatar</label>
            <p class="text-muted font-14">Tamaño de imagen recomendado 800x400 (px).</p>

            <form action="{{ route('imagenes.store')}}" method="post" enctype="multipart/form-data" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <div class="fallback">
                    <input name="file" type="file" />
                </div>

                <div class="dz-message needsclick">
                    <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                    <h4>Drop files here or click to upload.</h4>
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

    <div class="col-lg-6">
        <form action="/addingUser" method="POST">
            @csrf
        <div class="card">
            <div class="card-body">            
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" name="txtName" id="txtName" placeholder="" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Apellido</label>
                                <input type="text" class="form-control" name="txtLastName" id="txtLastName" placeholder="" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Nombre de usuario</label>
                                <input type="text" class="form-control" name="txtUserName" id="txtUserName" placeholder="" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder=""
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        El email que ingresaste ya esta repetdido.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">Password</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="" required>
                                <div class="invalid-feedback">
                                    <!--Please provide a valid city.-->
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Puesto</label>
                                <select class="form-select mb-3" name="slcAccess" id="slcAccess">
                                    <option selected>Elige una opción del menú</option>
                                    <option value="1">Dirección Ggeneral</option>
                                    <option value="2">Subdirección</option>
                                    <option value="3">Dirección de proyectos</option>
                                    <option value="4">Supervisión de obra</option>
                                    <option value="5">Superintendente de obra</option>
                                    <option value="6">Coordinador de obra</option>
                                    <!--<option value="8">SysAdmin - Soporte</option>-->
                                </select>  
                                <div class="invalid-feedback">
                                    <!--Please provide a valid state.-->
                                </div>
                            </div>
                            <!--<div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="invalidCheck" required>
                                    <label class="form-check-label form-label" for="invalidCheck">Agree to terms
                                        and conditions</label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>-->

                            
                      
                    </div> <!-- end preview-->
                
                </div> <!-- end tab-content-->

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary" >
                Agregar usuario
            </button>
        </div>
    </div>

</div>

</form>

@endsection