@extends('layouts.app')

@section('main_container')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                
            </div>
            <h4 class="page-title">Lista de contratistas</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xxl-3">
        <div class="card">
            @foreach ($contractors as $contractor)
            <div class="card-body">
                <!--
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item">View Profile</a>
                        <a href="javascript:void(0);" class="dropdown-item">Project Info</a>
                    </div>
                </div>-->
                <div class="text-center">
                    @if ($contractor && is_object($contractor) && property_exists($contractor, 'img_logo') && $contractor->img_logo == NULL)
                        <img class="card-img-top" src="{{ asset("uploads/user.png") }}" alt="contractor image cap">
                    @elseif ($contractor && is_object($contractor) && property_exists($contractor, 'img_logo'))
                        <img class="card-img-top" src="{{ asset("uploads/$contractor->img_logo") }}" alt="contractor image cap">
                    @endif
                    
                    <h4 class="mt-3 my-1">{{$contractor->contractorName}} <i class="mdi mdi-check-decagram text-success"></i></h4>
                    <p class="mb-0 text-muted"><i class="mdi mdi-email-outline me-1"></i>{{$contractor->email}}</p>
                    <hr class="bg-dark-lighten my-3">
                    <h5 class="mt-3 fw-semibold text-muted">Proyecto: <b>{{$contractor->projectName}}</b></h5>
                
                    <div class="row mt-3">

                        <div class="col-6">
                            <a href="tel:{{$contractor->phone}}" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Call"><i class="mdi mdi-phone"></i></a>
                        </div>
                        <div class="col-6">
                            <a href="mailto:{{$contractor->email}}" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Email"><i class="mdi mdi-email-outline"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($loop->iteration % 4 == 0)
                </div><div class="row">
            @endif
            @endforeach
            
        </div>
    </div>
</div>
@endsection