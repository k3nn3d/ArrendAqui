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
                "name"=> "Vivenda",
                "id_categoria"=> 1
            ],
              [
                "id"=> 2,
                "name"=> "Apartamento",
                "id_categoria"=> 1
              ],
             
              [
                "id"=> 3,
                "name"=> "Esritório",
                "id_categoria"=> 2
              ],
             
              [
                "id"=> 4,
                "name"=> "Casa de alvenaria",
                "id_categoria"=> 2
              ],
              [
                "id"=> 5,
                "name"=> "Salão de festas",
                "id_categoria"=> 2
              ],
              
        ];
        
        foreach ($dados as $key => $value){
            sub_categoria::create($value);
        }
    }
}
