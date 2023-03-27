@extends('adminlte::page')

@section('title', 'Editar Aluno')

@section('content_header')
    <h1>Editar Aluno</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" value="{{ $aluno->nome }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" value="{{ $aluno->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" name="data_nascimento" value="{{ $aluno->data_nascimento }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
