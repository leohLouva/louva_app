@extends('layouts.app')

@section('main_container')
<script src="{{ asset("/assets/js/views/obra.js") }}"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                
            </div>
            <h4 class="page-title">LISTADO DE OBRAS</h4>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-sm-4">
        <!-- Agregar formulario de búsqueda -->
        <form action="{{ route('proyectos.buscar') }}" method="GET" id="listadoObras">
            <div class="input-group">
                <input type="text" class="form-control" name="q" id="buscarO" placeholder="BUSCAR OBRAS..." oninput="this.value = this.value.toUpperCase()">
                <button class="btn btn-primary" type="submit">BUSCAR</button>
            </div>
        </form>
    </div>
    <div class="col-sm-8">
        <div class="text-sm-end">
            <a href="{{ route('lista-obras.index') }}" class="btn btn-primary rounded-pill mb-3" >VER TODAS LAS OBRASS</a>
            <a href="{{ route('agregar-obra.verAgregarProyecto') }}" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i>  OBRA NUEVA</a>
        </div>
    </div>
</div> 
<div class="col-sm-8" id="searchResultsContainer"></div>

<div class="row">

@foreach ($projects as $project)
    <div class="col-md-6 col-xxl-3">
        <div class="card d-block">
            <div class="d-flex justify-content-center align-items-center">
                @if ($project && is_object($project) && property_exists($project, 'projectImage') && $project->projectImage == NULL)
                    <img class="card-img-top" src="{{ asset("uploads/sample.jpg") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
                @elseif ($project && is_object($project) && property_exists($project, 'projectImage'))
                    <img class="card-img-top" src="{{ asset("uploads/obras/$project->projectImage") }}" alt="project image cap" style="max-width: 250px; max-height: 250px;">
                @endif
            </div>
            <div class="card-img-overlay" >
            </div>

            <div class="card-body position-relative" id="listObras">
                <h4 class="mt-0">
                    <a href="{{ route('editar-obra.show', ['id' => $project->idProject]) }}" class="text-title"> {{ $project->projectName}}</a>
                </h4>
                <p class="mb-3">
                    <i class="mdi mdi-google-maps"></i><b>UBICACION:</b> {{$project->municipio}}, {{$project->estado}} <br>
                    <span class="pe-2 text-nowrap">
                        <i class="mdi mdi-format-list-bulleted-type"></i><b>DESCRIPCIÓN:</b>
                        <p>{{ strlen($project->description) > 25 ? substr($project->description, 0, 25) . '...' : $project->description }}</p>
                        
                    </span>
                </p>
                <div class="mb-3" id="tooltip-container4" style="align-content: center;">
                    <a href="{{ route('editar-obra.show', ['id' => $project->idProject]) }}" class="btn btn-warning rounded-pill mb-3" ><i class="uil uil-comment-alt-edit"></i> VER INFORMACIÓN</a>
                </div>            
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endforeach

</div>

<div class="col-md-12">
    <nav aria-label="...">
        <ul class="pagination mb-0">
            <li class="page-item {{ $projects->currentPage() == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $projects->previousPageUrl() }}" tabindex="-1" aria-disabled="true">ANTERIOR</a>
            </li>

            @for ($i = 1; $i <= $projects->lastPage(); $i++)
                <li class="page-item {{ $projects->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $projects->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <li class="page-item {{ $projects->currentPage() == $projects->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $projects->nextPageUrl() }}">SIGUIENTE</a>
            </li>
        </ul>
    </nav>
    <div class="mt-2">
        MOSTRANDO {{ $projects->firstItem() }} DE {{ $projects->lastItem() }} DE {{ $projects->total() }} OBRAS.
    </div>
</div>


 
@endsection
