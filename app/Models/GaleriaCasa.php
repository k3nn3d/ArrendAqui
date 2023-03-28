<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaCasa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_casa',
        'vc_path'
    ];
}
