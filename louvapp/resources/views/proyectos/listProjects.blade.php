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
        <a href="{{ url("apps-projects-add.html") }}" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i> Create Project</a>
    </div>
    <div class="col-sm-8">
        <div class="text-sm-end">
            <div class="btn-group mb-3">
                <button type="button" class="btn btn-primary">All</button>
            </div>
            <div class="btn-group mb-3 ms-1">
                <button type="button" class="btn btn-light">Ongoing</button>
                <button type="button" class="btn btn-light">Finished</button>
            </div>
            <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                <button type="button" class="btn btn-secondary"><i class="ri-function-line"></i></button>
            </div>
            <div class="btn-group mb-3 d-none d-sm-inline-block">
                <button type="button" class="btn btn-link text-muted"><i class="ri-list-check-2"></i></button>
            </div>
        </div>
    </div><!-- end col-->
</div> 
<!-- end row-->

<div class="row">
    <div class="col-md-6 col-xxl-3">
        <!-- project card -->
        <div class="card d-block">
            <!-- project-thumbnail -->
            <img class="card-img-top" src="{{ asset("/assets/images/projects/project-1.jpg") }}" alt="project image cap">
            <div class="card-img-overlay">
                <div class="badge bg-secondary text-light p-1">Ongoing</div>
            </div>

            <div class="card-body position-relative">
                <!-- project title-->
                <h4 class="mt-0">
                    <a href="{{ url("apps-projects-details.html") }}" class="text-title">Company logo design</a>
                </h4>

                <!-- project detail-->
                <p class="mb-3">
                    <span class="pe-2 text-nowrap">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <b>3</b> Tasks
                    </span>
                    <span class="text-nowrap">
                        <i class="mdi mdi-comment-multiple-outline"></i>
                        <b>104</b> Comments
                    </span>
                </p>
                <div class="mb-3" id="tooltip-container4">
                    <a href="{{ url("javascript:void(0);") }}" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme" class="d-inline-block">
                        <img src="{{ asset("/assets/images/users/avatar-3.jpg") }}" class="rounded-circle avatar-xs" alt="friend">
                    </a>

                    <a href="{{ url("javascript:void(0);") }}" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty" class="d-inline-block">
                        <img src="{{ asset("/assets/images/users/avatar-5.jpg") }}" class="rounded-circle avatar-xs" alt="friend">
                    </a>

                    <a href="{{ url("javascript:void(0);") }}" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson" class="d-inline-block">
                        <img src="{{ asset("/assets/images/users/avatar-9.jpg") }}" class="rounded-circle avatar-xs" alt="friend">
                    </a>
                </div>

                <!-- project progress-->
                <p class="mb-2 fw-bold">Progress <span class="float-end">45%</span></p>
                <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                    </div><!-- /.progress-bar -->
                </div><!-- /.progress -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-md-6 col-xxl-3">
        <!-- project card -->
        <div class="card d-block">
            <!-- project-thumbnail -->
            <img class="card-img-top" src="{{ asset("/assets/images/projects/project-2.jpg") }}" alt="project image cap">
            <div class="card-img-overlay">
                <div class="badge bg-success p-1">Finished</div>
            </div>

            <div class="card-body position-relative">
                <!-- project title-->
                <h4 class="mt-0">
                    <a href="{{ url("apps-projects-details.html") }}" class="text-title">Landing page design - Home</a>
                </h4>

                <!-- project detail-->
                <p class="mb-3">
                    <span class="pe-2 text-nowrap">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <b>11</b> Tasks
                    </span>
                    <span class="text-nowrap">
                        <i class="mdi mdi-comment-multiple-outline"></i>
                        <b>254</b> Comments
                    </span>
                </p>
                <div class="mb-3" id="tooltip-container5">
                    <a href="{{ url("javascript:void(0);") }}" data-bs-container="#tooltip-container5" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme" class="d-inline-block">
                        <img src="{{ asset("/assets/images/users/avatar-10.jpg") }}" class="rounded-circle avatar-xs" alt="friend">
                    </a>

                    <a href="{{ url("javascript:void(0);") }}" data-bs-container="#tooltip-container5" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty" class="d-inline-block">
                        <img src="{{ asset("/assets/images/users/avatar-5.jpg") }}" class="rounded-circle avatar-xs" alt="friend">
                    </a>

                    <a href="{{ url("javascript:void(0);") }}" data-bs-container="#tooltip-container5" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson" class="d-inline-block">
                        <img src="{{ asset("/assets/images/users/avatar-7.jpg") }}" class="rounded-circle avatar-xs" alt="friend">
                    </a>
                    <a href="{{ url("javascript:void(0);") }}" class="d-inline-block text-muted fw-bold ms-2">
                        +2 more
                    </a>
                </div>

                <!-- project progress-->
                <p class="mb-2 fw-bold">Progress <span class="float-end">100%</span></p>
                <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                    </div><!-- /.progress-bar -->
                </div><!-- /.progress -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->

</div>
<!-- end row-->
 
@endsection