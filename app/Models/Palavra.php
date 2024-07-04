<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palavra extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_palavra');
    }
}