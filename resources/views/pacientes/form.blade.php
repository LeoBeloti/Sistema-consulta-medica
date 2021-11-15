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

                    @if (Request::is('pacientes/edit/*'))
                        <h1>Editar Paciente</h1>   
                        <form action="{{ url('pacientes/update') }}/{{$paciente->id}}" method="post">
                            @csrf
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome:</label>
                            <input type="text" name="name" class="form-control"  value="{{ $paciente->name }}">
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ $paciente->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <a href="{{ url('pacientes') }}">Voltar</a>
                    @else
                        <h1>Cadastar Pacientes</h1>   
                        <form action="{{ url('pacientes/add') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $medico }}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
