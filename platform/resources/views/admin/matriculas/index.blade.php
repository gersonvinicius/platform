@extends('adminlte::page')

@section('title', 'Matrículas')

@section('content_header')
    <h1>Matrículas por Curso</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('matriculas.create') }}" class="btn btn-primary mb-3">Nova Matrícula</a>
            <form action="{{ route('matriculas.index') }}" method="GET" class="form-inline float-right">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Pesquisar...">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Curso</th>
                        <th>Aluno</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matriculas as $matricula)
                        <tr>
                            <td>{{ $matricula->id }}</td>
                            <td>{{ $matricula->curso->titulo }}</td>
                            <td>{{ $matricula->aluno->nome }}</td>                            
                            <td>
                                <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Visualizar</a>
                                <a href="{{ route('matriculas.edit', $matricula->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                                <form method="POST" action="{{ route('matriculas.destroy', $matricula->id) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
