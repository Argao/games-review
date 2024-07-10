<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtora extends Model
{
    protected $fillable = ['produtora','pais_id'];

    use HasFactory;

    public function jogo()
    {
        return $this->hasMany('App/Jogo');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
