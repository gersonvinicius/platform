@extends('adminlte::page')

@section('title', 'Editar Curso')

@section('content_header')
    <h1>Editar Curso</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <form role="form" method="POST" action="{{ route('cursos.update', $curso->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $curso->titulo) }}" placeholder="Insira o título do curso">
                            @if ($errors->has('titulo'))
                                <span class="help-block"><strong>{{ $errors->first('titulo') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                            <label for="descricao">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" placeholder="Insira a descrição do curso">{{ old('descricao', $curso->descricao) }}</textarea>
                            @if ($errors->has('descricao'))
                                <span class="help-block"><strong>{{ $errors->first('descricao') }}</strong></span>
                            @endif
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{ route('cursos.index') }}" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
