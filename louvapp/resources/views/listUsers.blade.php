@extends('layouts.app')
<form action="/user/listUsers" method="GET">
    {{ csrf_field() }}
@section('main_container')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">
                    <i class="uil-user-square"></i> Lista de usuarios</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table id="users-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Id de Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Puesto</th>
                                <th>Status</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
        <a class="dropdown-item" 
            href="{{ route('logout') }}"onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();"> 
            {{ __('Logout') }}
        </a>
    </div>
    </form>
    @endsection

