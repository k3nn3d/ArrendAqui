<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelo',
        'vc_path',
        'marca',
        'estrelas',
        'combustivel',
        'preco',
        'lugares',
        'espaco',
        'id_user',
        'id_categoria'
    ];
}
