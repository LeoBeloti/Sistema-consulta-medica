@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('pacientes/new') }}">Cadastrar um novo paciente</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de Pacientes</h1>   
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id-Medico</th>
                            <th scope="col">id</th>
                            <th scope="col">nome</th>
                            <th scope="col">email</th>
                            <th scope="col">editar</th>
                            <th scope="col">deletar</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($pacientes as $p)
                          <tr>
                            <th scope="row">{{$medico}}</th>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->email }}</td>
                            <td>
                                <a href="pacientes/edit/{{ $p->id }}"class="btn btn-success">Editar</a>
                            </td>0
                            <td>
                                <form action="/pacientes/delete/{{$p->id}}" method="post">
                                @csrf
                                @method('delete')
                                    <button class="btn btn-danger">Deletar</button>
                                </form>
                            </td>

                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                      <a href="{{ url('/') }}">Voltar</a>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
