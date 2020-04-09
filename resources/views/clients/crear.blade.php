@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Agregar Cliente</span>
                    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">Volver</a>
                </div>
                <div class="card-body">    
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endforeach
                    @endif 
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
                  <form method="POST" action="{{ route('clients.store') }}">
                    @csrf
                    <input
                      type="text"
                      name="name"
                      placeholder="Nombre"
                      value="{{ old('name') }}"
                      class="form-control mb-2"
                    />
                    <input
                      type="number"
                      name="document"
                      placeholder="Documento"
                      value="{{ old('document') }}"
                      class="form-control mb-2"
                    />
                    <input
                      type="email"
                      name="email"
                      placeholder="Correo"
                      value="{{ old('email') }}"
                      class="form-control mb-2"
                    />
                    <input
                      type="text"
                      name="address"
                      placeholder="Dirección"
                      value="{{ old('address') }}"
                      class="form-control mb-2"
                    />
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection