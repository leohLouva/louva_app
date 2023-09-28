@extends('layouts.app')

@section('main_container')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                
            </div>
            <h4 class="page-title">Lista de proyectos</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row mb-2">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8">
        <div class="text-sm-end">
            <a href="{{ route('agregar-proyecto.verAgregarProyecto') }}" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i>  Proyecto</a>
        </div>
    </div><!-- end col-->
</div> 
<!-- end row-->

<div class="row">
    @foreach ($projects as $project)
        <div class="col-md-6 col-xxl-3">
            <div class="card d-block">
                @if ($project && is_object($project) && property_exists($project, 'img_logo') && $project->img_logo == NULL)
                    <img class="card-img-top" src="{{ asset("uploads/sample.jpg") }}" alt="project image cap">
                @elseif ($project && is_object($project) && property_exists($project, 'img_logo'))
                    <img class="card-img-top" src="{{ asset("uploads/$project->img_logo") }}" alt="project image cap">
                @endif
                <div class="card-img-overlay">
                    <div class="badge bg-{{ $project->progressColor}} text-light p-1">{{ $project->progressName}}</div>
                </div>
    
                <div class="card-body position-relative">
                    <!-- project title-->
                    <h4 class="mt-0">
                        <a href="{{ url("apps-projects-details.html") }}" class="text-title"> {{ $project->projectName}}</a>
                    </h4>
    
                    <!-- project detail-->
                    <p class="mb-3">
                        <span class="pe-2 text-nowrap">
                            <i class="mdi mdi-format-list-bulleted-type"></i>
                            <b>Descripción: </b>
                            <p>
                                {{ $project->description}}
                            </p>
                        </span>
                    </p>
                    <div class="mb-3" id="tooltip-container4">
                        <a href="{{ route('editar-proyecto.show', ['id' => $project->id]) }}" class="btn btn-warning rounded-pill mb-3" ><i class="uil uil-comment-alt-edit"></i> Editar</a>
                        <a href="#" style="display: none;" class="btn btn-info rounded-pill mb-3"><i class="mdi mdi-plus"></i> Ver detalle</a></a>
                    </div>
                    
    
                    <!-- project progress-->
                    <p class="mb-2 fw-bold">Progreso <span class="float-end">{{$project->progressPercentage}}%</span></p>
                    <div class="progress progress-md">
                        <div class="progress-bar bg-{{$project->progressColor}}" role="progressbar" style="width: {{$project->progressPercentage}}%" aria-valuenow="{{$project->progressPercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- /.progress -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        <!-- Contenido de cada elemento -->
        </div>
        @if ($loop->iteration % 4 == 0)
            </div><div class="row">
        @endif
        @endforeach
   
</div>
 
@endsection