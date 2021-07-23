<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class primerControlador extends Controller
{
    public function index(Request $request){
        return view('adios', [ 'nombre'=>$request->input('nombre'), 'apellido'=>'Giraldo', 'edad'=>17 ]);
    }
    public function crear(){
        return 'crear usuarios';
    }
    public function eliminar(){
        return 'eliminar usuarios';
    }
}
