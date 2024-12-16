<?php

namespace App\Models;

class Emprestimo extends Rmodel
{
    protected $table= 'emprestimos';
    protected $fillable = ['dataPrazo', 'dataDevolvido', 'usuario_id', 'livro_id'];
}
