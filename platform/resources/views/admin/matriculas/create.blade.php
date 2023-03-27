@extends('adminlte::page')

@section('title', 'Nova Matricula')

@section('content_header')
    <h1>Nova Matricula</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('matriculas.store') }}">
                @csrf

                <div class="form-group">
                    <label for="aluno_id">Aluno</label>
                    <select name="aluno_id" id="aluno_id" class="form-control">
                    @foreach ($alunos as $id => $nome)
                        <option value="{{ $id }}">{{ $nome }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="curso_id">Curso</label>
                    <select name="curso_id" id="curso_id" class="form-control">
                    @foreach ($cursos as $id => $titulo)
                        <option value="{{ $id }}">{{ $titulo }}</option>
                    @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('matriculas.index') }}" class="btn btn-default">Cancelar</a>
            </form>

        </div>
    </div>
@stop
