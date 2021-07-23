@extends('layouts.estructura')

@section('content')
    <div class="row m-4 ">
        <div class="col">
            <h1>Crear nuevo Informe</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
        @if($errors->any())
        <div class="w-75 mx-auto" >
          <div class="alert alert-danger  my-1" role="alert"> Error! No se ha guardado el registro </div>
          <ul class="list-group-flush" >
            @foreach( $errors->all() as $error)
              <li class="list-group-item list-group-item-danger">{{$error}} </li>
            @endforeach
          </ul>
        </div>         
        @endif
            <form action="/informe_gastos" method="POST" class="w-75 mx-auto formulario p-4 rounded" >
                @csrf
                <div class="formgroup row mb-3">
                    <label for="CategoriaGasto" class="col-sm-4 col-form-label">Categoria Gasto</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="CategoriaGasto" name="CategoriaGasto">
                    </div>
                </div>
                <div class="formgroup row mb-3">
                    <label for="FechaInforme" class="col-sm-4 col-form-label">Fecha Informe</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="FechaInforme" name="FechaInforme">
                    </div>
                </div>
                <div class="formgroup row mb-3">
                    <label for="idTrabajador" class="col-sm-4 col-form-label">id Trabajador</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="idTrabajador" name="idTrabajador">
                    </div>
                </div>
                <div class="row w-50 mx-auto"> <button type="submit" class="btn btn-success btn-lg col-12 mx-auto text-center">Crear</button></div>
            </form>
        </div>
    </div>
    <a href="/informe_gastos" class="btn btn-primary m-3" role="button">Atrás</a>
@endsection