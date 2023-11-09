@extends('layouts.app')

@section('main_container')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                
            </div>
            <h4 class="page-title">LISTADO DE OBRAS</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row mb-2">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8">
        <div class="text-sm-end">
            <a href="{{ route('agregar-proyecto.verAgregarProyecto') }}" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i>  OBRA NUEVA</a>
        </div>
    </div><!-- end col-->
</div> 
<!-- end row-->

<div class="row">
@foreach ($projects as $project)
<div class="col-md-6 col-xxl-3">
    <div class="card d-block">
        <div class="d-flex justify-content-center align-items-center">
            @if ($project && is_object($project) && property_exists($project, 'projectImage') && $project->projectImage == NULL)
                <img class="card-img-top" src="{{ asset("uploads/sample.jpg") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
            @elseif ($project && is_object($project) && property_exists($project, 'projectImage'))
                <img class="card-img-top" src="{{ asset("uploads/proyectos/$project->projectImage") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
            @endif
        </div>
        <div class="card-img-overlay" >
        </div>
        <div class="card-body position-relative">
            <!-- project title-->
            <h4 class="mt-0">
                <a href="{{ url("apps-projects-details.html") }}" class="text-title"> {{ $project->projectName}}</a>
            </h4>
            <p class="mb-3">
                <span class="pe-2 text-nowrap">
                    <i class="mdi mdi-format-list-bulleted-type"></i>
                    <b>DESCRIPCIÓN:</b>
                    <p>{{ strlen($project->description) > 25 ? substr($project->description, 0, 25) . '...' : $project->description }}</p>
                </span>
            </p>
            <div class="mb-3" id="tooltip-container4" style="align-content: center;">
                <a href="{{ route('editar-proyecto.show', ['id' => $project->idProject]) }}" class="btn btn-warning rounded-pill mb-3" ><i class="uil uil-comment-alt-edit"></i> VER INFORMACIÓN</a>
            </div>
            

            
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