<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matriculas')->insert([
            [
                'aluno_id' => 1,
                'curso_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aluno_id' => 1,
                'curso_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aluno_id' => 2,
                'curso_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aluno_id' => 3,
                'curso_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // adicione os demais registros aqui
        ]);
    }
}
