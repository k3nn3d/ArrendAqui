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
            "name"=> "Carro",
            
        ],
        [
            "id"=> 2,
            "name"=> "Casa",
            
          ]
    ];
    
    foreach ($dados as $key => $value){
        Categoria::create($value);
    }
}
    }

