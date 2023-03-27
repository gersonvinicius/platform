<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();

        return view('admin.alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|min:4',
            'email' => 'required|email|unique:alunos',
            'data_nascimento' => 'required|date',
        ]);

        $aluno = new Aluno();
        $aluno->nome = $validatedData['nome'];
        $aluno->email = $validatedData['email'];
        $aluno->data_nascimento = $validatedData['data_nascimento'];
        $aluno->save();

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        return view('admin.alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        return view('admin.alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|min:4',
            'email' => [
                'required',
                'email',
                Rule::unique('alunos')->ignore($aluno->id),
            ],
            'data_nascimento' => 'required|date',
        ]);

        $aluno->nome = $validatedData['nome'];
        $aluno->email = $validatedData['email'];
        $aluno->data_nascimento = $validatedData['data_nascimento'];

        $aluno->save();

        return redirect()->route('alunos.index')->with('success', 'Aluno alterado com sucesso!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $aluno->delete();

        return redirect()->route('alunos.index');
    }
}
