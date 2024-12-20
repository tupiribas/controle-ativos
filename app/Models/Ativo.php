<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'valor', 'data_aquisicao', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
