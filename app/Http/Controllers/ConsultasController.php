<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Consulta;
use Redirect;


class ConsultasController extends Controller
{
    public function index()
    {
        $consultas = Consulta::get();
        // $pacientes = Paciente::where(['user_id'=>$medico]);
        // dd($pacientes);
        return view('consultas.list-consultas', ['consultas'=>$consultas]);
    }
    public function new()
    {
        $medico = Auth::user()->id;
        $pacientes = Paciente::where(['user_id'=>$medico])->get();
        return view('consultas.form', ['medico' => $medico, 'pacientes'=>$pacientes]);
    }
    public function add( Request $request )
    {
        // dd($request->all());
        $consulta = new Consulta;
        $consulta -> create( $request->all() );
        return  Redirect::to('/consultas');
    }
    public function edit( $id )
    {
        $medico = Auth::user()->id;
        $consulta = Consulta::findOrFail( $id );
        return view('consultas.form', ['consulta'=>$consulta, 'medico' => $medico]);
    }
    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail( $id );
        $consulta -> update( $request->all() );
        return  Redirect::to('/consultas');   
    }
    public function delete($id)
    {
        $consultas = Consulta::findOrFail( $id );
        $consultas -> delete();
        return  Redirect::to('/consultas'); 
    }
}
