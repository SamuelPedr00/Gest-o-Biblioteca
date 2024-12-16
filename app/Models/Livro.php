<?php

namespace App\Models;

class Livro extends Rmodel
{
    protected $table= 'livros';
    protected $fillable = ['nome', 'autor', 'sinopse', 'statusEmprestimo', 'status'];

    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'livro_generos', 'livro_id', 'genero_id');
    }
}
