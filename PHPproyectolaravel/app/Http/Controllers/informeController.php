<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informe;
use App\Models\Gasto;
use App\Mail\informeConsolidado;
use Illuminate\Support\Facades\Mail;



class informeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informe.index', ['informe'=>informe::all(), 'fondo'=>'#9effba']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informe.create', ['informe'=>informe::all(), 'fondo'=>'#add8e6']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData=$request ->validate([
            'CategoriaGasto' => 'required|min:5',
            'FechaInforme' => 'required | date',
            'idTrabajador' => 'required| int | min:9999999 | max:9999999999'
        ]);
        $nuevo= new informe();
        $nuevo->CategoriaGasto = $request->get('CategoriaGasto');
        $nuevo->FechaInforme = $request->get('FechaInforme');
        $nuevo->idTrabajador = $request->get('idTrabajador');
        $nuevo-> save();
        return redirect('/informe_gastos') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(informe $informes, $id, Gasto $gasto)
    {
        return view('informe.show', ['id'=>$id ,'informe'=>$informes::findOrFail($id), 'gasto'=>$gasto::find($id), 'gastos'=>$gasto::all() , 'fondo'=>'#91a5f5']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informe = informe::findOrFail($id);
        return view('informe.edit', ['informe'=>$informe, 'fondo'=>'#d0f36f']);
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
        $informe = informe::findOrFail($id);
        $informe->CategoriaGasto = $request->get('CategoriaGasto');
        $informe->FechaInforme = $request->get('FechaInforme');
        $informe->idTrabajador = $request->get('idTrabajador');
        $informe-> save();
        return redirect('/informe_gastos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
*/

    public function destroy($id)
    {
        $informe = informe::findOrFail($id);
        $informe ->delete();
        $gasto= Gasto::find($id);
        if(isset($gasto->ArticuloDetalle)){
            $gasto-> delete();
        }
        return redirect('/informe_gastos')->with('success', 'Se ha eliminado el registro con éxito');      
    }

    public function confirm ($id) {
        $informe = informe::findOrFail($id);
        return view('informe.confirm', ['informe'=>$informe, 'fondo'=>'#f3d46f']);
    }
    public function confirmMail($id) {
        $informe = informe::findOrFail($id);
        return view('informe.confirmMail', ['informe'=>$informe, 'fondo'=>'#f3d46f']);
    }
    public function sendMail(Request $request , $id){
        $validData=$request ->validate([
            'mail' => 'email:rfc,dns'
        ]);

        $informe = informe::findOrFail($id);
        Mail::to($request->get('mail'))->send(new informeConsolidado($informe));
        return redirect('/informe_gastos/'.$id);
    }
}
