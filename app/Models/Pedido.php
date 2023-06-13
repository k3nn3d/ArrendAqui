<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_carro',
        'id_casa',
        'id_user',
        'estado',
        'preco',
        'data',
        'hora',
        'latitude',
        'longitude',
       
    ];
}
