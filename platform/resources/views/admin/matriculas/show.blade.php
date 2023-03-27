@extends('adminlte::page')

@section('title', 'Detalhes da matrícula')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalhes da Matrícula</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $matricula->id }}</p>
            <p><strong>Aluno:</strong> {{ $matricula->aluno->nome }}</p>
            <p><strong>Curso:</strong> {{ $matricula->curso->titulo }}</p>
            <p><strong>Data da Matrícula:</strong> {{ $matricula->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Última Atualização:</strong> {{ $matricula->updated_at->format('d/m/Y H:i:s') }}</p>
            <a href="{{ route('matriculas.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection
