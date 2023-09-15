<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Agregar Usuarios</h4>
                <p class="text-muted font-14">Agrega un usuario nuevo, recuerda que estos usuarios operarán el sistema.</p>

                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#custom-styles-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            Preview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#custom-styles-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            Code
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                        <form class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">First name</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Last name</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">City</label>
                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">State</label>
                                <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom05">Zip</label>
                                <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="invalidCheck" required>
                                    <label class="form-check-label form-label" for="invalidCheck">Agree to terms
                                        and conditions</label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div> <!-- end preview-->
                
                </div> <!-- end tab-content-->

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>