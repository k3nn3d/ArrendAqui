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
            "name"=> "Moradia",
            
        ],
        [
            "id"=> 2,
            "name"=> "Armazém",
            
        ],
        [
            "id"=> 3,
            "name"=> "Escritório",
            
        ],
        [
            "id"=> 4,
            "name"=> "Salão de festas",
            
        ],
        [
            "id"=> 5,
            "name"=> "Espaço comercial",
            
        ],
        [
            "id"=> 6,
            "name"=> "Hotel",
            
        ],
        [
            "id"=> 7,
            "name"=> "Apartamento",
            
        ],
    ];
    
    foreach ($dados as $key => $value){
        Categoria::create($value);
    }
}
    }

