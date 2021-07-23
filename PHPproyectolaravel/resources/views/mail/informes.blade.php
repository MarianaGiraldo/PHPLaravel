<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Informes</title>
    <style>
    .fondo {
        background-color: #f3d46f;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
}
    .w-75{
        width: 75%;
    }
    .mx-auto{
        margin: 5px auto;
    }
    .p-1{
        padding: 5px;
    }
    .table-primary{
        background-color: #a0f0e6;
    }
    .table-light{
        background-color: white;
    }
    </style>

</head>
  <body class="">
    <div class="container w-75 mx-auto my-3 fondo rounded p-1">
        
        <div class="row">
            <div class="col">
                <h2>Informe de id: {{$informe->id}} </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <h3>Gastos</h3>
            <table class="table table-hover table-bordered border-success w-75 mx-auto">
                <tr class="table-primary table-active">
                    <th>ID</th>
                    <th scope="col">Articulo y Detalle</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Cantidad</th>
                </tr>
            @foreach($informe->informeGastos as $gasto)
            <tr class="table-light">
                    <td class="table-warning" scope="row" >{{$gasto->id}}</td>
                    <td >{{$gasto->ArticuloDetalle}} </td>
                    <td >{{$gasto->Valor}} </td>
                    <td >{{$gasto->Cantidad}} </td>
            @endforeach
            </table>
            </div>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
