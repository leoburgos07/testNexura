@extends('layouts.app')
@section('title')
Listado de empleados
@endsection


@section('content')
<div class="row">
    <div class="col">
        <h1>Listado de empleados</h1>
    </div>
    <div class="col text-right">
        <a href="{{route('createEmployee')}}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Crear</a>
    </div>
</div>

@if (count($employees) > 0)
<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col"><i class="fa-solid fa-user"></i> Nombre</th>
            <th scope="col"><i class="fa-solid fa-at"></i> Email</th>
            <th scope="col"><i class="fa-solid fa-venus-mars"></i> Sexo</th>
            <th scope="col"><i class="fa-solid fa-briefcase"></i> Área</th>
            <th scope="col"><i class="fa-solid fa-envelope"></i> Boletín</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($employees as $employee)
        <tr class="text-center">
            <th>{{$employee->name}}</th>
            <td>{{$employee->email}}</td>
            <td>{{$employee->sex}}</td>
            <td>{{$employee->area->name}}</td>
            <td>{{$employee->bulletin}}</td>
            <td><a href="{{route('editEmployee', ['employee' => $employee])}}" class="btn "><i class="fa-solid fa-pen-to-square fa-lg"></i> </a> </td>
            <form action="{{route('deleteEmployee',['employee' => $employee])}}" method="POST">
                @csrf
                @method('DELETE')
                <td> <button type="submit" class="btn "><i class="fa-solid fa-trash-can fa-lg"></i></button></td>
            </form>

        </tr>
        @empty
        <div class="container mt-lg-5">
            <p class="h1 text-danger text-center">No hay empleados registrados actualmente!!</p>
        </div>
        @endforelse


    </tbody>
</table>
@else
<div class="container mt-lg-5">
    <p class="h1 text-danger text-center">No hay empleados registrados actualmente</p>
</div>
@endif
@endsection