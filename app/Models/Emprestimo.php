<?php

namespace App\Models;

class Emprestimo extends Rmodel
{
    protected $table= 'emprestimos';
    protected $fillable = ['dataPrazo', 'dataDevolvido', 'usuario_id', 'livro_id'];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id'); 
    }
}
