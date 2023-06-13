<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\aluguel;

class Casa extends Model
{
    use HasFactory;
    protected $table='casas';
    protected $fillable = [
                'name',
                'rua',
                'preco',
                'quartos',
                'casa_de_banho',
                'id_categoria',
                'id_sub_categoria',
                'id_provincia',
                'id_municipio',
                'id_unidade',
                'id_user',
                'cozinha',
                'descricao',
                'vc_path',
                'latitude',
                'longitude',
                'estado',
    ];

    public function reserva()
    {
        return $this->hasMany(aluguel::class,'id_casa');
    }
}
