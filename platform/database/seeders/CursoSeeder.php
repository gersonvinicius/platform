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
            [
                'titulo' => 'Curso de Angular',
                'descricao' => 'Aprenda a desenvolver aplicações web com Angular',
            ],
            [
                'titulo' => 'Curso de Vue',
                'descricao' => 'Aprenda a desenvolver aplicações web com Vue',
            ],
            [
                'titulo' => 'Curso de React',
                'descricao' => 'Aprenda a desenvolver aplicações web com React',
            ],
            // Adicione mais cursos aqui
        ]);
    }
}
