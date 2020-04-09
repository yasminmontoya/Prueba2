@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar Cliente</span>
                    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">Volver</a>
                </div>
                <div class="card-body">    
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                    @endif
                  <form method="POST" action="{{ route('clients.update', $client->id) }}">
                    @method('PUT')
                    @csrf

                    @error('email')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El correo ingresado ya esta registrado.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @enderror 

                    <input
                      type="text"
                      name="name"
                      placeholder="Nombre"
                      value="{{ $client->name }}"
                      class="form-control mb-2"
                      required
                    />
                    <input
                      type="number"
                      name="document"
                      placeholder="Documento"
                      value="{{ $client->document }}"
                      class="form-control mb-2"
                      required
                    />
                    <input
                      type="email"
                      name="email"
                      placeholder="Correo"
                      value="{{ $client->email }}"
                      class="form-control mb-2"
                      required
                    />
                    <input
                      type="text"
                      name="address"
                      placeholder="Dirección"
                      value="{{ $client->address }}"
                      class="form-control mb-2"
                      required
                    />
                    <button class="btn btn-primary btn-block" type="submit">Editar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection