<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao','nota','capa','produtora_id','genero_id'];

    public function produtora()
    {
        return $this->belongsTo(Produtora::class);
    }

    public function genero()
    {
        return$this->belongsTo(Genero::class);
    }
}

