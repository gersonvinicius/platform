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
                    <input type="text" class="form-control" name="q" placeholder="Pesquisar...">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($matriculasPorCurso as $curso => $matriculas)
            <div class="card my-3">
                <h2 class="card-header">{{ $curso }}</h2>

                <div class="card-body">
                    @if(count($matriculas) == 0)
                        <p>Nenhum aluno matriculado neste curso.</p>
                    @else
                        <ul class="list-group">
                            @foreach($matriculas as $matricula)
                                <li class="list-group-item">{{ $matricula->nome }} - {{ $matricula->email }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@stop
