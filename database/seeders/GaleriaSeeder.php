<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GaleriaCasa;

class GaleriaSeeder extends Seeder
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
                "id_casa"=> "10",
                "vc_path" => 4,
                
            ],
            [
                "id"=> 2,
                "id_casa"=> "11",
                "vc_path" => 5,
                
            ],
            [
                "id"=> 3,
                "id_casa"=> "6",
                "vc_path" => 5,
                
            ],
            [
                "id"=> 4,
                "id_casa"=> "7",
                "vc_path" => 4,
                
            ],
            [
                "id"=> 5,
                "id_casa"=> "12",
                "vc_path" => 3,
                
            ],
            [
                "id"=> 6,
                "id_casa"=> "9",
                "vc_path" => 5,
                
              ]
        ];
        
        foreach ($dados as $key => $value){
            GaleriaCasa::create($value);
        }
    }

}

