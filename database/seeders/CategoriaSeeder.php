<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dados=[
        [
            "id"=> 1,
            "name"=> "Prédio",
            
        ],
        [
            "id"=> 2,
            "name"=> "Espaço para lazer",
            
        ],
        [
            "id"=> 3,
            "name"=> "Espaços para trabalho",
            
        ]
    ];
    
    foreach ($dados as $key => $value){
        Categoria::create($value);
    }
}
    }

