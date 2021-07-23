<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informe;
use App\Models\Gasto;

class gastosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(informe $informe, $id)
    {
        $informe = informe::findOrFail($id); 
        return view('gasto.create', ['informe'=>$informe, 'id'=>$id, 'fondo'=>'#ccb8e6']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validData=$request ->validate([
            'idTrabajador' => 'required| int | min:9999999 | max:9999999999',
            'ArticuloDetalle' => 'required | string',
            'Valor' => 'required | int',
            'Cantidad' => 'required | int',
        ]);
        $nuevo= new Gasto();
        $nuevo->id = $id;
        $nuevo->informe_id = $id;
        $nuevo->FechaInforme = $request->get('FechaInforme');
        $nuevo->idTrabajador = $request->get('idTrabajador');
        $nuevo->ArticuloDetalle= $request->get('ArticuloDetalle');
        $nuevo->Valor = $request->get('Valor');
        $nuevo->Cantidad = $request->get('Cantidad');
        $nuevo-> save();
        return redirect('/informe_gastos/'.$id) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto = Gasto::findOrFail($id);
        return view('gasto.edit', ['id'=>$id , 'gasto'=>$gasto, 'fondo'=>'#dda9e1']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData=$request ->validate([
            'CategoriaGasto' => 'min:5',
            'FechaInforme' => 'date',
            'idTrabajador' => 'int | min:9999999 | max:9999999999'
        ]);
        $gasto = Gasto::findOrFail($id);
        $gasto->informe_id = $id;
        $gasto->FechaInforme = $request->get('FechaInforme');
        $gasto->idTrabajador = $request->get('idTrabajador');
        $gasto->ArticuloDetalle= $request->get('ArticuloDetalle');
        $gasto->Valor = $request->get('Valor');
        $gasto->Cantidad = $request->get('Cantidad');
        $gasto-> save();
        return redirect('/informe_gastos/'.$id) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gasto = Gasto::findOrFail($id);
        $gasto ->delete();  
        return redirect('/informe_gastos/'.$id)->with('success', 'Se ha eliminado el registro con éxito');   
    }
    public function confirm ($id) {
        $gasto = Gasto::findOrFail($id);
        return view('gasto.confirm', ['gasto'=>$gasto, 'fondo'=>'#f3926f']);
    }
}
