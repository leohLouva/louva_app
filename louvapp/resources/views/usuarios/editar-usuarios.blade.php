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
            <h4 class="header-title">Editar usuario</h4>
            
        
        </div>
    </div>
    <div class="row">
        
        <div class="col-xl-4 col-sm-6"></div> <!-- end col -->
        <div class="col-xl-4 col-sm-6"></div> <!-- end col -->
    </div>
    <div class="col-lg-6">
        
           
      
        <div class="mb-3 mt-3 mt-xl-0">
            <div class="card text-center">
                <div class="card-body">
                    @if ($user && is_object($user) && property_exists($user, 'img_profile') && $user->img_profile == NULL)
                        <img src="{{ asset("uploads/user.png") }}" style="height: 100px;" alt="avatar-2" class="rounded-circle img-thumbnail">
                    @elseif ($user && is_object($user) && property_exists($user, 'img_profile'))
                        <img src="{{ asset("uploads//$user->img_profile") }}" style="height: 100px;" alt="avatar-2" class="rounded-circle img-thumbnail">
                    @endif

                    <h4 class="mb-0 mt-2">{{$user->name}} {{$user->lastName}}</h4>
                    <p class="text-muted font-14">{{$user->accessName}}</p>

                    <div class="text-start mt-3">
                        <h4 class="font-13 text-uppercase">Contacto :</h4>
                        <p class="text-muted font-13 mb-3">
                            Puedes contactarlo aquí: 
                            <span class="ms-2 ">
                                <a href=""></a>
                                <a href="#" onclick="window.open('mailto:{{$user->email}}', '_blank'); return false;">{{$user->email}}</a>
                            </span>
                        </p>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
            
            <div style="display: none;">
                <p class="text-muted font-14">El tamaño de imagen recomendado 800x400 (px).</p>
                <form action="{{ route('imagenes.store')}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
    
                    <div class="dz-message needsclick">
                        <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                        <h4>Suelte los archivos aquí o haz clic para cargarlos.</h4>
                    </div>
    
                </form>
    
                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>
    
            </div>
           
            
        </div>
    </div>

    <div class="col-lg-6">
        <form action="/editando-usuario/{{ $user->id }}" method="POST">
            @csrf
        <div class="card">
            <div class="card-body">            
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                        <div class="mb-3">
                            <input type="hidden" name="flImage" value="{{ $user->img_profile }}">
                        </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" name="txtName" id="txtName" placeholder="" value="{{$user->name}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Apellido</label>
                                <input type="text" class="form-control" name="txtLastName" id="txtLastName" placeholder="" value="{{$user->lastName}}" required>

                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Nombre de usuario</label>
                                <input type="text" class="form-control" name="txtUserName" id="txtUserName" placeholder="" value="{{$user->userName}}" required>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder=""
                                        aria-describedby="inputGroupPrepend" value="{{$user->email}}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">Password</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" value="*********" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Puesto</label>
                                <select class="form-select mb-3" name="slcAccess" id="slcAccess">
                                    <option value="{{ $user->access_level}}">{{ $user->accessName }}</option>
                                </select>  
                            </div>                      
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary" >
                Guardar cambios
            </button>
        </div>
    </div>

</div>

</form>


@endsection

       