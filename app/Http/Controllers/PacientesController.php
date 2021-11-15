<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Paciente;
use App\Models\User;

use Illuminate\Http\Request;
use Redirect;

class PacientesController extends Controller
{
    public function index()
    {
        $medico = Auth::user()->id;
        $pacientes = Paciente::get();
        return view('pacientes.list-pacientes', ['pacientes' => $pacientes,'medico' => $medico]);
    }
    public function new()
    {
        $medico = Auth::user()->id;
        return view('pacientes.form', ['medico' => $medico]);
    }
    public function add( Request $request )
    {
        $paciente = new Paciente;
        $paciente = $paciente -> create( $request->all() );
        return  Redirect::to('/pacientes');
    }
    public function edit( $id )
    {
        $medico = Auth::user()->id;
        $paciente = Paciente::findOrFail( $id );
        return view('pacientes.form', ['paciente'=>$paciente, 'medico' => $medico]);
    }
    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail( $id );
        $paciente -> update( $request->all() );
        return  Redirect::to('/pacientes');   
    }
    public function delete($id)
    {
        $paciente = Paciente::findOrFail( $id );
        $paciente -> delete();
        return  Redirect::to('/pacientes'); 
    }
}