@extends('layouts.estructura')

@section('content')

    <div class="row p-4">
        <div class="col">
            <h1>Informe de Gastos</h1>
            <table class="table table-hover table-bordered border-success">
                <tr class="table-primary table-active">
                    <th>ID</th>
                    <th scope="col">Categoria Gasto</th>
                    <th scope="col">Fecha Informe</th>
                    <th scope="col">id del Trabajador</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            @foreach ($informe as $informe)

                <tr class="table-light">
                    <td class="table-warning" scope="row" ><a href="/informe_gastos/{{$informe->id}}"> {{$informe->id}}</a> </td>
                    <td >{{$informe->CategoriaGasto}} </td>
                    <td >{{$informe->FechaInforme}} </td>
                    <td >{{$informe->idTrabajador}} </td>
                    <td ><a class="btn btn-success btn-sm" role="button" href="/informe_gastos/{{$informe->id}}/edit" >Modificar</a> </td>
                    <td ><a class="btn btn-danger btn-sm" role="button" href="{{route('ConfirmDelete',['informe_gasto'=>$informe->id] )}}" > Eliminar</a> </td>

                </tr>
            @endforeach
            </table>
            <a href="/informe_gastos/create" class="btn btn-primary d-grid gap-2 col-6 mx-auto" role="button">Crear Informe</a>
        </div>
    </div>
@endsection