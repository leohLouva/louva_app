@extends('layouts.app')

@push('styles')
<!-- Dropzone File Css From dropzone webpage-->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
<script src="{{ asset("/assets/js/views/proyecto.js") }}"></script>


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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">            
                    <div class="tab-content">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img class="card-img-top" src="{{ asset("uploads/proyectos/$projects->projectImage") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-success stretched-link">{{ $projects->projectName}}</a>
                                    </h5>
                                    <p class="card-text">
                                        {{$projects->description}}
                                    </p>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h5>Teléfono:</h5>
                                            <a href="tel:{{$projects->telefono}}">{{$projects->telefono}}</a>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h5>Fecha de inicio</h5>
                                            <p>{{ \Carbon\Carbon::parse($projects->fechaInicio)->formatLocalized('%d - %B - %Y') }}</p>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-5">
                                            <h5>Costo total</h5>
                                            <p>$ {{ number_format($projects->totalScheduledCost, 2, '.', ',') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h5>Tipo de proyecto:</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">{{$projects->projectType}}</label>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>% de Avance</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{  $projects->progress }}%;" aria-valuenow="{{ $projects->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $projects->progress }}%</div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-4">
            <div class="card">
                <div class="card-body">           
                    <form action="/proyectos/editando-proyecto/{{$projects->id}}" method="POST" id="editingProject">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre del proyecto</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="" value="{{$projects->projectName}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="" value="{{$projects->telefono}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción del proyecto</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="" maxlength="140">{{$projects->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre del desarrollador</label>
                            <select class="form-control select2" data-toggle="select2" id="desarrollador" name="desarrollador">
                                <option value="0">Selecciona un Desarrollador</option>
                                @foreach ($owners as $owner)
                                    <option value="{{$owner->idUser_worker}}"@if ($owner->idUser_worker == $projects->idUser_projectManager) selected @endif>{{$owner->name}} {{$owner->lastName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre del Responsable de obra (DRO)</label>
                            <select class="form-control select2" data-toggle="select2" id="responsableObra" name="responsableObra">
                                <option value="0">Selecciona a un responsable de obra</option>
                                @foreach ($reponsables as $reponsable)
                                    <option value="{{$reponsable->id}}"@if ($reponsable->id == $projects->idUser_workManager) selected @endif>{{$reponsable->name}} {{$reponsable->lastName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label">% del proyecto </label>
                            <input class="form-control" type="text" name="porcentaje" id="porcentaje" value="{{$projects->progress}}">
                        </div>
                        <div class="mb-3 position-relative" id="datepicker1">
                            <label class="form-label">Fecha de inicio</label>
                            <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true" value="{{$projects->fechaInicio}}">
                        </div>
                </div>
            </div>
        </div>
            
            <div class="col-4">
                <div class="card">
                    <div class="card-body">            
                            <div class="mb-3">
                                <label class="form-label">Tipo de proyecto</label>
                                <input type="text" id="tipoProyecto" name="tipoProyecto" class="form-control" value="{{$projects->projectType}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">M<sup>2</sup> superficiales</label>
                                <input type="text" id="mtsSuperficiales" name="mtsSuperficiales" class="form-control" value="{{$projects->squareMeterSuperficial}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">M<sup>2</sup> sótano</label>
                                <input type="text" id="mtsSotano" name="mtsSotano" class="form-control" value="{{$projects->squareMeterSotano}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sistema de construcción</label>
                                <input type="text" id="sistemaConstruccion" name="sistemaConstruccion" class="form-control" value="{{$projects->constructionSystem}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total del costo programado</label>
                                <input type="text" id="totalCosto" name="totalCosto" class="form-control" value="{{$projects->totalScheduledCost}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" value="{{$projects->address}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-control select2" data-toggle="select2" id="estado" name="estado">
                                    <option value="0">Selecciona un estado</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->idEstado}}"@if ($state->idEstado == $projects->state) selected @endif>{{$state->estado}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="mb-3">
                                <label class="form-label">Locación</label>
                                <select class="form-control select2" data-toggle="select2" id="municipio" name="municipio">
                                    <option value="{{$projects->location}}">{{$projects->municipio}}</option>
                                </select>
                            </div>      
                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="flImage" name="flImage" value="{{$projects->projectImage}}">
                                <input class="form-control" type="hidden" name="folderName" id="folderName" value="NA">
                                <button type="button" class="btn btn-primary" onclick="editarProyecto()" >
                                    Editar Proyecto
                                </button>
                            </div>             
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
            
    <script>
        $(document).ready(function() {
            $('#estado').on('change', function() {
                var estadoId = $(this).val();
                if (estadoId > 0) {
                    $.ajax({
                        url: '/municipios/' + estadoId,
                        type: 'GET',
                        success: function(data) {
                            var locacionSelect = $('#municipio');
                            locacionSelect.empty(); 
                            console.log(data);
                            $.each(data, function(key, value) {
                                console.log(value);
                                locacionSelect.append('<option value="' + value.idMunicipio + '">' + value.municipio + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>       

       

  

<!-- Bootstrap Datepicker Plugin js -->
<script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>






@endsection

       