@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Request::is('consultas/edit/*'))
                        <h1>Editar Consulta</h1>   
                        <form action="{{ url('consultas/update') }}/{{$consulta->id}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Data:</label>
                              <input type="date" name="data_consulta" value="{{$consulta->data_consulta}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hora:</label>
                                <input type="time" name="hora_consulta" value="{{$consulta->hora_consulta}}">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </form>
                        
                        <a href="{{ url('consultas') }}">Voltar</a>
                    @else
                        <h1>Cadastrar Consulta</h1>   
                        <form action="{{ url('consultas/add') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $medico }}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Paciente:</label>
                            <select name="paciente_id">
                                @foreach ($pacientes as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Data:</label>
                          <input type="date" name="data_consulta">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hora:</label>
                            <input type="time" name="hora_consulta">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                        <a href="{{ url('/') }}">Voltar</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
