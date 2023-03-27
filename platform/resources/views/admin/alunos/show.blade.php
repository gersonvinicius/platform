@extends('adminlte::page')

@section('content_header')
    <h1>Detalhes do Aluno</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <h2>{{ $aluno->nome }}</h2>
                    <p><strong>ID: </strong>{{ $aluno->id }}</p>
                    <p><strong>Email: </strong>{{ $aluno->email }}</p>
                    <p><strong>Data de Nascimento: </strong>{{ \Carbon\Carbon::parse($aluno->data_nascimento)->format('d/m/Y') }}</p>
                    <p><strong>Cursos Matriculados:</strong></p>
                    
                </div>
                <div class="box-footer">
                    <a href="{{ route('alunos.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@stop
