@extends('layouts.app')

@section('main_container')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                
            </div>
            <h4 class="page-title">Directorio de empresas</h4>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($contractors as $contractor)
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{ route('editar-contratista.show', ['id' => $contractor->idContractor]) }}"  class="dropdown-item"> Ver detalle</a>
                            <a href="{{ route('lista-trabajadores.indexFuerza',['idContractor' => $contractor->idContractor]) }}" class="dropdown-item" >Ver su fuerza de trabajo</a>
                        </div>
                    </div>
                    <div class="text-center">
                        @if ($contractor->img_contractor && $contractor->folderName)
                            <img class="card-img-top" src="{{ asset("uploads/empresa/".$contractor->folderName."/".$contractor->img_contractor) }}" alt="contractor image cap{{$contractor->idContractor}}" style="max-width: 150px; max-height: 150px;">
                        @else
                            <img class="card-img-top" src="{{ asset("uploads/user.png") }}" alt="contractor image cap" style="max-width: 250px; max-height: 250px;">
                        @endif
                        <h4 class="mt-3 my-1">{{$contractor->contractorName}} <i class="mdi mdi-check-decagram text-success"></i></h4>
                        <p class="mb-0 text-muted"><i class="mdi mdi-email-outline me-1"></i>{{$contractor->emailContractor}}</p>
                        <hr class="bg-dark-lighten my-3">
                        <h5 class="mt-3 fw-semibold text-muted">Proyecto: <b>{{$contractor->projectName}}</b></h5>
                    
                        <div class="row mt-3">
                            <div class="col-6">
                                <a href="tel:{{$contractor->phoneContractor}}" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Call"><i class="mdi mdi-phone"></i></a>
                            </div>
                            <div class="col-6">
                                <a href="mailto:{{$contractor->emailContractor}}" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Email"><i class="mdi mdi-email-outline"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endforeach
            
</div>



@endsection