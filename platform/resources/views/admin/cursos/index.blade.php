@extends('adminlte::page')

@section('title', 'Cursos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cursos</h3>
                    <div class="box-tools">
                        <a href="{{ route('alunos.create') }}" class="btn btn-primary">Novo Curso</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->id }}</td>
                                    <td>{{ $curso->titulo }}</td>
                                    <td>{{ $curso->descricao }}</td>
                                    <td>
                                        <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Visualizar</a>
                                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                                        <form method="POST" action="{{ route('cursos.destroy', $curso->id) }}" style="display: inline-block;">
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
        </div>
    </div>
@stop
