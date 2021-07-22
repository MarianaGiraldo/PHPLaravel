<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorFicha extends Controller
{
    public function index(Request $request){
        return view('prueba', [ 'ficha'=>$request->input('ficha'), 'programa'=>$request->input('programa'), 'tipo'=>$request->input('tipo'), 'estudiantes'=>['Mariana G', 'Daniel G', 'Nayive G', 'Daniel Santiago', 'Jose Milton'] ]);
    }
}
