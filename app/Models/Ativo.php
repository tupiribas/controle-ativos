<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'data_aquisicao',
    ];
}
