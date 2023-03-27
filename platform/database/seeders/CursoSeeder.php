<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            [
                'titulo' => 'Curso de PHP',
                'descricao' => 'Aprenda a programar em PHP',
            ],
            [
                'titulo' => 'Curso de Laravel',
                'descricao' => 'Aprenda a desenvolver aplicações web com Laravel',
            ],
            // Adicione mais cursos aqui
        ]);
    }
}
