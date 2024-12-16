<?php

namespace App\Models;

class Usuario extends Rmodel
{
    protected $table= 'usuarios';
    protected $fillable = ['nome', 'email', 'status'];
}
