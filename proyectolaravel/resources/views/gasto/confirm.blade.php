@extends('layouts.estructura')

@section('content')
<?php  
// use App\Models\informe;
// $informe = informe::all();
// $id = $informe[1]->id;
// $informe = informe::find($id);
// $fondo= '#ffaa22';
?>
    <div class="row m-4 ">
        <div class="col">
            <h1>Eliminar el gasto de id {{$gasto->id}} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('DestroyGasto', $gasto->id) }}" method="POST" class="w-50 mx-auto formularioConfirmG p-4 rounded" >
                @csrf
                @method('DELETE')
                <div class="formgroup row mb-3">
                    <label for="Eliminar" class="col col-form-label">Confirme si quiere eliminar el gasto.</label>
                </div>
                <button type="submit" class="btn btn-danger">Eliminar</button> 
                <a href="/informe_gastos/{{$gasto->id}} " class="btn btn-primary m-3" role="button">Cancelar y volver</a>
                
            </form>
            <br><br>
        </div>
    </div>
    
@endsection