<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoPalavra extends Model
{
    use HasFactory;

    protected $table = 'grupo_palavra';

    protected $fillable = [
        'palavra_id',
        'grupo_id'
    ];

    public function palavras()
    {
        return $this->belongsToMany(Palavra::class, 'grupo_palavra');
    }
}
