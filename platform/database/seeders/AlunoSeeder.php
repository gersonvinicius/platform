<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alunos')->insert([
            [
                'nome' => 'João',
                'email' => 'joao@teste.com',
                'data_nascimento' => '2000-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Maria',
                'email' => 'maria@teste.com',
                'data_nascimento' => '1995-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Roberto',
                'email' => 'roberto@teste.com',
                'data_nascimento' => '1997-10-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Luis',
                'email' => 'luis@teste.com',
                'data_nascimento' => '1994-03-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // adicione os demais registros aqui
        ]);
    }
}
