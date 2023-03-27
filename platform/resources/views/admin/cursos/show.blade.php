@extends('adminlte::page')

@section('title', 'Detalhes do Curso')

@section('content_header')
    <h1>Detalhes do Curso</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                <label>Título:</label>
                <p>{{ $curso->titulo }}</p>
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <p>{{ $curso->descricao }}</p>
            </div>
            <div class="form-group">
                <label>Criado em:</label>
                <p>{{ $curso->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="form-group">
                <label>Última atualização:</label>
                <p>{{ $curso->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <a href="{{ route('cursos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@stop
