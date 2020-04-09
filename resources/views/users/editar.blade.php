@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar Usuario</span>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Volver</a>
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
                  <form method="POST" action="{{ route('users.update', $user->id) }}">
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
                      value="{{ $user->name }}"
                      class="form-control mb-2"
                      required
                    />
                    <input
                      type="email"
                      name="email"
                      placeholder="Correo"
                      value="{{ $user->email }}"
                      class="form-control mb-2"
                      required
                    />
                    <input
                      type="password"
                      name="password"
                      placeholder="Contraseña"
                      value="{{ $user->password }}"
                      class="form-control mb-2"
                      required
                    />
                    @foreach ($roles as $role)
                    @if($user->getRole($role->name)==$role->name)
                    <input
                      type="hidden"
                      name="role_ant"
                      value="{{ $role->name }}"
                      class="form-control mb-2"
                      required
                    />
                    @endif
                    @endforeach
                    <select name="role" class="custom-select mb-2">
                    @foreach ($roles as $role)
                      @if($user->getRole($role->name)==$role->name)
                      <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                      @else
                      <option value="{{ $role->name }}">{{ $role->name }}</option>
                      @endif
                    @endforeach
                    </select>
                    <button class="btn btn-primary btn-block" type="submit">Editar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection