<?php

namespace App\Http\Controllers;
use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Curso;

use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index(Request $pesquisa)
    {
        $matriculas = Matricula::select('matriculas.*', 'alunos.nome', 'alunos.email', 'cursos.titulo')
                ->join('alunos', 'matriculas.aluno_id', '=', 'alunos.id')
                ->join('cursos', 'matriculas.curso_id', '=', 'cursos.id')
                ->where(function($query) use ($pesquisa) {
                    $query->where('alunos.nome', 'like', '%'.$pesquisa.'%')
                          ->orWhere('alunos.email', 'like', '%'.$pesquisa.'%');
                })
                ->get();

        // Agrupa as matriculas por curso
        $matriculasPorCurso = $matriculas->groupBy('titulo');
    
        return view('admin.matriculas.index', compact('matriculasPorCurso'));
    }

    public function create()
    {
        $alunos = Aluno::pluck('nome', 'id');
        $cursos = Curso::pluck('titulo', 'id');

        return view('admin.matriculas.create', compact('alunos', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required',
            'curso_id' => 'required',
        ]);
    
        $matricula = new Matricula([
            'aluno_id' => $request->get('aluno_id'),
            'curso_id' => $request->get('curso_id'),
        ]);
    
        $matricula->save();
    
        return redirect()->route('matriculas.index')->with('success', 'Matricula cadastrada com sucesso!');
    }

    public function show(Matricula $matricula)
    {
        return view('admin.matriculas.show', compact('matricula'));
    }

    public function edit(Matricula $matricula)
    {
        $alunos = Aluno::all();
        $cursos = Curso::all();
        return view('admin.matriculas.edit', compact('matricula', 'alunos', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);

        $validatedData = $request->validate([
            'aluno_id' => 'required',
            'curso_id' => 'required',
        ]);

        $matricula->update($validatedData);

        return redirect()->route('matriculas.index')
            ->with('success', 'Matrícula atualizada com sucesso.');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return redirect()->route('matriculas.index')
            ->with('success', 'Matrícula excluída com sucesso.');
    }
}
