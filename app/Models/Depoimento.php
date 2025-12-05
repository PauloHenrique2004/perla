<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
//    use HasFactory;

    protected $table = 'depoimentos';

    protected $fillable = [
        'nome',
        'foto',
        'estrelas',
        'texto',
        'ativo',
        'ordem',
    ];

    protected $casts = [
        'ativo'   => 'boolean',
        'estrelas'=> 'integer',
        'ordem'   => 'integer',
    ];
}
