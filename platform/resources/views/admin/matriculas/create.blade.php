@extends('adminlte::page')

@section('title', 'Nova Matricula')

@section('content_header')
    <h1>Nova Matricula</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['url' => '/matriculas']) !!}

                <div class="form-group">
                    {!! Form::label('aluno_id', 'Aluno') !!}
                    {!! Form::select('aluno_id', $alunos, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('curso_id', 'Curso') !!}
                    {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
