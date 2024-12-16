<?php

namespace App\Models;

class LivroGenero extends Rmodel
{
    protected $table= 'livro_generos';
    protected $fillable = ['genero_id', 'livro_id'];
}
