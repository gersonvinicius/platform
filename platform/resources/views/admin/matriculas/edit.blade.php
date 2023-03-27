@extends('adminlte::page')

@section('title', 'Editar matrícula')

@section('content_header')
    <h1>Editar matrícula</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                <form method="POST" action="{{ route('matriculas.update', $matricula->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="aluno_id">Aluno:</label>
                            <select name="aluno_id" class="form-control">
                                @foreach($alunos as $id => $nome)
                                    <option value="{{ $id }}" {{ $matricula->aluno_id == $id ? 'selected' : '' }}>{{ $nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="curso_id">Curso:</label>
                            <select name="curso_id" class="form-control">
                                @foreach($cursos as $id => $titulo)
                                    <option value="{{ $id }}" {{ $matricula->curso_id == $id ? 'selected' : '' }}>{{ $titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{ route('matriculas.index') }}" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
