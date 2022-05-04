<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\JugadoresExport;
use Maatwebsite\Excel\Facades\Excel;


class JugadorController extends Controller
{
    public function exportarExcel(){
        return Excel::download(new JugadoresExport, 'Jugadores.xlsx');
    }

    public function exportarPDF(){
        $jugadores = Jugador::all();
        $pdf = PDF::loadView('jugador.pdf', compact('jugadores'));
        //return view('jugador.pdf', compact('jugadores'));
        return $pdf->setPaper('a4', 'landscape')->download('Jugadores.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $datos['jugadores'] = Jugador::paginate(3);
        return view('jugador.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jugador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosJugador = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosJugador['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Jugador::insert($datosJugador);
        //return response()->json($datosJugador);
        return redirect('jugador') ->with('mensaje','Jugador agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugador.read', compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugador.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosJugador = request()->except('_token','_method');
        if($request->hasFile('Foto')){
            $jugador = Jugador::findOrFail($id);
            Storage::delete('public/'.$jugador->Foto);
            $datosJugador['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Jugador::where('id','=',$id)->update($datosJugador);
        $jugador = Jugador::findOrFail($id);
        //return view('jugador.edit', compact('jugador'));
        return redirect('jugador') ->with('mensaje','Jugador modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);
        if(Storage::delete('public/'.$jugador->Foto)){
            Jugador::destroy($id);
        }
        return redirect('jugador') ->with('mensaje','Jugador borrado exitosamente');
    }
}
