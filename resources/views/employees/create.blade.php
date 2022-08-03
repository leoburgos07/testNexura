@extends('layouts.app')

@section('title')
Crear Empleado
@endsection

@section('content')
<div class="row">
    <div class="col">
        <h1>Registrar un empleado</h1>
    </div>
    <div class="col text-right">
        <a href="{{route('home')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left-long"></i> Volver</a>
    </div>
</div>

<form method="POST" action="{{url('storeEmployee')}}">
{!! csrf_field() !!}
    <div class="form-group">
        <label for="name" class="font-weight-bold">Nombre Completo <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
    </div>
    <div class="form-group">
        <label for="email" class="font-weight-bold">Correo Electrónico <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Sexo <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="male" value="M" checked>
            <label class="form-check-label" for="male">
                Masculino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" value="F" id="female">
            <label class="form-check-label" for="female">
                Femenino
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="area" class="font-weight-bold">Area <span class="text-danger">*</span> </label>
        <select class="form-control" id="area" name="area">
            @foreach ($areas as $area)
            <option value="{{$area->id}}">{{$area->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="description" class="font-weight-bold">Descripción <span class="text-danger">*</span></label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="true"  name="bulletin">
        <label class="form-check-label font-weight-bold" for="bulletin">
            Deseo recibir boletín informativo
        </label>
    </div>
    <label class="font-weight-bold">Roles <span class="text-danger">*</span></label>
    @foreach ($roles as $rol)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="rol[]" value="{{$rol->id}}">
        <label class="form-check-label">
            {{$rol->name}}
        </label>
    </div>
    @endforeach
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection