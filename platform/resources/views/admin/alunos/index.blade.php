@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Listagem de Alunos</h3>
                    <div class="box-tools">
                        <a href="{{ route('alunos.create') }}" class="btn btn-primary">Novo Aluno</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Data de Nascimento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($aluno->data_nascimento)->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Visualizar</a>
                                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                                        <form method="POST" action="{{ route('alunos.destroy', $aluno->id) }}" style="display: inline-block;">
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
