@extends('layouts.test')

@section('titulo')
    Users - Con sesión iniciada
@endsection 

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        {{ __('Estamos en usuarios') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection