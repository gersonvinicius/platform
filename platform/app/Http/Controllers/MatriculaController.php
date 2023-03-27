<?php

namespace App\Http\Controllers;
use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Curso;

use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index(Request $request)
    {
        $query = Matricula::query()->leftJoin('alunos', 'matriculas.aluno_id', '=', 'alunos.id')
                ->select('matriculas.*')
                ->whereNull('matriculas.deleted_at');

        if ($request->has('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('alunos.nome', 'like', '%' . $request->search . '%')
                    ->orWhere('alunos.email', 'like', '%' . $request->search . '%');
            });
        }
        
        $matriculas = $query->get();

        return view('admin.matriculas.index', compact('matriculas'));
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
    
        // return redirect()->route('matriculas.index')->with('success', 'Matricula cadastrada com sucesso!');
        return redirect()->route('matriculas.index', ['pesquisa' => '']);
    }

    public function show($id)
    {
        $matricula = Matricula::findOrFail($id);
        return view('admin.matriculas.show', compact('matricula'));
    }

    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);
        $alunos = Aluno::pluck('nome', 'id');
        $cursos = Curso::pluck('titulo', 'id');
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

    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return redirect()->route('matriculas.index')
            ->with('success', 'Matrícula excluída com sucesso.');
    }
}
