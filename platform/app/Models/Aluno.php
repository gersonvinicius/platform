<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Aluno extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'email', 'data_nascimento'];
    protected $dates = ['deleted_at'];

    public function matriculas()
    {
        return $this->belongsToMany(Matricula::class);
    }
}
