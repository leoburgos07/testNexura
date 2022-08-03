@extends('layouts.app')

@section('title')
Editar Empleado
@endsection

@section('content')
<div class="row">
    <div class="col">
        <h1>Editar Empleado</h1>
    </div>
    <div class="col text-right">
        <a href="{{route('home')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left-long"></i> Volver</a>
    </div>
</div>

<form method="POST" action="{{route('updateEmployee',['employee' => $employee])}}">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name" class="font-weight-bold">Nombre Completo <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$employee->name}}">
    </div>
    <div class="form-group">
        <label for="email" class="font-weight-bold">Correo Electrónico <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{$employee->email}}">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Sexo <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="male" value="M" @if ($employee->sex == "M")
            checked
            @endif >
            <label class="form-check-label" for="male">
                Masculino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" value="F" id="female" @if ($employee->sex == "F")
            checked
            @endif>
            <label class="form-check-label" for="female">
                Femenino
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="area" class="font-weight-bold">Area <span class="text-danger">*</span> </label>
        <select class="form-control" id="area" name="area">
            @foreach ($areas as $area)
            @if ($employee->area_id == $area->id)
            <option value="{{$area->id}}" selected>{{$area->name}}</option>
            @else
            <option value="{{$area->id}}">{{$area->name}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="description" class="font-weight-bold">Descripción <span class="text-danger">*</span></label>
        <textarea class="form-control" id="description" rows="3" name="description" value> {{$employee->description}}</textarea>
    </div>
    <div class="form-check">
        @if ($employee->bulletin == 1)
        <input class="form-check-input" type="checkbox" value="true" name="bulletin" checked>
        @else
        <input class="form-check-input" type="checkbox" value="true" name="bulletin">
        @endif

        <label class="form-check-label font-weight-bold" for="bulletin">
            Deseo recibir boletín informativo
        </label>
    </div>
    
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
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