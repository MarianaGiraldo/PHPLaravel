@extends('layouts.estructura')

@section('content')
    <div class="row m-4 ">
        <div class="col mx-auto text-center">
            <h1>Información del gasto de id {{$informe->id}} </h1>
        </div>
    </div>
    <div class="row">
        <div class="w-75 mx-auto rounded">

          <div class="row my-3">
          <h4>Datos del informe</h4>
            <div class="col-sm-4">
              <div class="card show">
                <div class="card-body">
                  <h5 class="card-title">Categoría Gasto:</h5>
                  <p class="card-text">{{$informe->CategoriaGasto}}</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card show">
                <div class="card-body">
                  <h5 class="card-title">Documento del trabajador:</h5>
                  <p class="card-text">{{$informe->idTrabajador}}</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card show">
                <div class="card-body">
                  <h5 class="card-title">Fecha del Informe:</h5>
                  <p class="card-text">{{$informe->FechaInforme}}</p>
                </div>
              </div>
            </div>
          </div>
          <br>
          <h4>Datos del Gasto</h4>
          <div class="row">
            <div class="col-sm-4">
              <div class="card show">
                <div class="card-body">
                  <h5 class="card-title">Artículo y Detalle:</h5>
                  <p class="card-text">
                  @isset($gasto->ArticuloDetalle)
                  {{$gasto->ArticuloDetalle}}
                  @endisset

                  @empty($gasto->ArticuloDetalle)
                   Gasto no creado
                  @endempty
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card show">
                <div class="card-body">
                  <h5 class="card-title">Valor:</h5>
                  <p class="card-text">
                  @isset($gasto->Valor)
                  {{$gasto->Valor}}
                  @endisset
                  @empty($gasto->Valor)
                    Gasto no creado
                  @endempty
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card show">
                <div class="card-body">
                  <h5 class="card-title">Cantidad:</h5>
                  <p class="card-text">
                  @isset($gasto->Cantidad)
                  {{$gasto->Cantidad}}
                  @endisset
                  @empty($gasto->Cantidad)
                  Gasto no creado
                  @endempty
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          @empty($gasto->Cantidad)
          <a href="{{route('CreateGasto',['informe_gasto'=>$informe->id] )}}" class="btn btn-success my-3 d-grid gap-2 col-6 btn-lg" role="button">Crear gasto</a>
          @endempty

          <a href="{{route('ConfirmMail',['informe_gasto'=>$id] )}}" class="btn btn-primary m-3 col btn-lg" role="button">Enviar información al mail</a>
          </div>
        </div>  
    </div>
    
    <div class="row mt-5 p-4">
      <table class="table table-hover table-bordered border-success w-75 mx-auto">
      <h2 class="mx-auto text-center">Todos los gastos</h2>
        <tr class="table-primary table-active">
            <th>ID</th>
            <th scope="col">Fecha Informe</th>
            <th scope="col">id del Trabajador</th>
            <th scope="col">Artículo detalle</th>
            <th scope="col">Valor</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    @foreach ($gastos as $gasto)
        <tr class="table-light">
            <td class="table-warning" scope="row" >{{$gasto->id}}</td>
            <td >{{$gasto->FechaInforme}} </td>
            <td >{{$gasto->idTrabajador}} </td>
            <td >{{$gasto->ArticuloDetalle}} </td>
            <td >{{$gasto->Valor}} </td>
            <td >{{$gasto->Cantidad}} </td>
            <td ><a class="btn btn-success btn-sm" role="button" href="{{route('EditGasto',['informe_gasto'=>$gasto->id] )}}" >Modificar</a> </td>
            <td ><a class="btn btn-danger btn-sm" role="button" href="{{route('ConfirmDeleteG',['informe_gasto'=>$gasto->id] )}}" > Eliminar</a> </td>
        </tr>
    @endforeach
    </table>
    
    </div>
    <a href="/informe_gastos" class="btn btn-warning m-3" role="button">Atrás</a>

@endsection