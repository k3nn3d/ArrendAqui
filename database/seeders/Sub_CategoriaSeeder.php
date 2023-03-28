<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\sub_categoria;

class Sub_CategoriaSeeder extends Seeder
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
                "name"=> "Transporte de Coisas",
                "id_categoria"=> 1
            ],
              [
                "id"=> 2,
                "name"=> "Táxi",
                "id_categoria"=> 1
              ],
              [
                "id"=> 3,
                "name"=> "Dupléx",
                "id_categoria"=> 2
              ],
              [
                "id"=> 4,
                "name"=> "Tripléx",
                "id_categoria"=> 2
              ],
              [
                "id"=> 5,
                "name"=> "Casa Com piscina",
                "id_categoria"=> 2
              ],
              [
                "id"=> 6,
                "name"=> "Casa de alvenaria",
                "id_categoria"=> 2
              ],
              [
                "id"=> 7,
                "name"=> "Vivenda",
                "id_categoria"=> 2
              ],
              [
                "id"=> 8,
                "name"=> "Condomínio",
                "id_categoria"=> 2
              ]
              
        ];
        
        foreach ($dados as $key => $value){
            sub_categoria::create($value);
        }
    }
}
