<?php

namespace App\Models;

class Genero extends Rmodel
{
    protected $table= 'generos';
    protected $fillable = ['nome', 'status'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_generos', 'genero_id', 'livro_id');
    }
}
