<script src="{{ asset("/assets/vendor/dropzone/min/dropzone.min.js") }}"></script>
<!-- init js -->
<script src="{{ asset("/assets/js/ui/component.fileupload.js") }}"></script>
                     
<div class="row">
    <h4 class="header-title">Agregar Usuarios</h4>
    <p class="text-muted font-14">Agrega un usuario nuevo, recuerda que estos usuarios operarán el sistema.</p>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">            
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                       
                        <!-- File Upload -->
<form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
data-upload-preview-template="#uploadPreviewTemplate">
<div class="fallback">
    <input name="file" type="file" id="imgProfile" multiple />
</div>

<div class="dz-message needsclick">
    <i class="h1 text-muted ri-upload-cloud-2-line"></i>
    <h3>Drop files here or click to upload.</h3>
    <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
        <strong>not</strong> actually uploaded.)</span>
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

                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">            
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" id="txtName" placeholder="" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Apellido</label>
                                <input type="text" class="form-control" id="txtLastName" placeholder="" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Nombre de usuario</label>
                                <input type="text" class="form-control" id="txtUserName" placeholder="" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" id="txtEmail" placeholder=""
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">Password</label>
                                <input type="password" class="form-control" id="txtPassword" placeholder="" required>
                                <div class="invalid-feedback">
                                    <!--Please provide a valid city.-->
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Puesto</label>
                                <input type="text" class="form-control" id="slcPuesto" placeholder="" required>
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


</div>
<button type="button" class="btn btn-primary" onclick="saveNewser()">
    Agregar usuario
</button>