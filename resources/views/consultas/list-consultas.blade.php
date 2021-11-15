@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('consultas/new')}}">Agendar uma nova consulta</a> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Lista de Consultas</h1> 
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id-Medico</th>
                            <th scope="col">id</th>
                            <th scope="col">id Paciente</th>
                            <th scope="col">data</th>
                            <th scope="col">hora</th>
                            <th scope="col">editar</th>
                            <th scope="col">deletar</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($consultas as $c)
                          <tr>
                            <th scope="row">{{$c->user_id}}</th>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->data_consulta }}</td>
                            <td>{{ $c->hora_consulta }}</td>
                            <td>{{ $c->paciente_id }}</td>
                            <td>
                                <a href="consultas/edit/{{ $c->id }}"class="btn btn-success">Editar</a>
                            </td>0
                            <td>
                                <form action="/consultas/delete/{{$c->id}}" method="post">
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
