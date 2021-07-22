@extends('layouts.estructura')

@section('content')
    <div class="row m-4 ">
        <div class="col">
            <h1>Editar gasto de id: {{$id}}</h1>
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
            <form action="/informe_gastos/{{$id}}/gasto/update" method="POST" class="w-75 mx-auto formularioEditG p-4 rounded" >
                @csrf
                @method('put')
                <div class="formgroup row mb-3">
                    <label for="FechaInforme" class="col-sm-4 col-form-label">Fecha Informe</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="FechaInforme" name="FechaInforme" value="{{$gasto->FechaInforme}}">
                    </div>
                </div>
                <div class="formgroup row mb-3">
                    <label for="idTrabajador" class="col-sm-4 col-form-label">id Trabajador</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="idTrabajador" name="idTrabajador" value="{{$gasto->idTrabajador}}">
                    </div>
                </div>
                <div class="formgroup row mb-3">
                    <label for="ArticuloDetalle" class="col-sm-4 col-form-label">Articulo y Detalle</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ArticuloDetalle" name="ArticuloDetalle" value="{{$gasto->ArticuloDetalle}}">
                    </div>
                </div>
                <div class="formgroup row mb-3">
                    <label for="Cantidad" class="col-sm-4 col-form-label">Cantidad</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="Cantidad" min="1" name="Cantidad" value="{{$gasto->Cantidad}}">
                    </div>
                </div>
                <div class="formgroup row mb-3">
                    <label for="Valor" class="col-sm-4 col-form-label">Valor</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="Valor" name="Valor" value="{{$gasto->Valor}}">
                    </div>
                </div><br>
                <div class="row w-50 mx-auto"> <button type="submit" class="btn btn-success btn-lg col-12 mx-auto text-center">Modificar</button></div>
                
            </form>
        </div>
    </div>
    <a href="/informe_gastos/{{$id}}" class="btn btn-primary m-3" role="button">Atrás</a>
@endsection