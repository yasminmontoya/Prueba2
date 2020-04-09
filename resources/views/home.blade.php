@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(@Auth::user()->hasRole('Administrador'))
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Administrar Usuarios</a>
                    @endif
                    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">Administrar Clientes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
