<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Casa;

class CasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        Casa::create([
            "id" => 1,
            'name' => "Casa no Benfica",
            'id_user'=>5,
            'preco'=>15000,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa.jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=>86, //Viana
            'quartos'=> 4,
            'cozinha'=>1,
            'casa_de_banho'=>1,
            'id_categoria'=>1,
            'id_unidade'=>1,
            'plano'=>3,
            'latitude'=>-8.907870,
            'longitude'=>13.363460
          
        ]);

        Casa::create([
            "id" => 2,
            'name' => "Casa branca",
            'id_user'=>6,
            'preco'=>15000,
            'descricao' => "7 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa.jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>4, //Nambuangongo
            'quartos'=> 7,
            'id_categoria'=>1,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'plano'=>3,
            'latitude'=>-7.994902696550908,
            'longitude'=>14.126801365779613
          
        ]);

        Casa::create([
            "id" => 3,
            'name' => "Casa bonita",
            'id_user'=>5,
            'id_categoria'=>1,
            'preco'=>16000,
            'descricao' => "5 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa2.jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>2, // Ambriz
            'quartos'=> 5,
            'cozinha'=>1,
            'id_unidade'=>2,
            'casa_de_banho'=>1,
            'latitude'=>-7.862651782117677,
            'longitude'=>13.118569349211063
            
            
          
        ]);

        Casa::create([
            "id" => 4,
            'name' => "Casa bonita",
            'id_user'=>6,
            'id_categoria'=>2,
            'preco'=>10000,
            'descricao' => "1 quarto, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa3.jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=> 83, //Cazenga
            'quartos'=> 1,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'latitude'=>-8.8288947886903,
            'longitude'=>13.289885139153832
             

        ]);

        Casa::create([
            "id" => 5,
            'name' => "Casa para alugar, tudo em ordem",
            'id_user'=>5,
            'preco'=>25000,
            'descricao' => "3 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa.jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=>85, //Luanda
            'quartos'=> 3,
            'id_categoria'=>2,
            'cozinha'=>1,
            'casa_de_banho'=>1,
            'id_unidade'=>2,
            'plano'=>2,
            'latitude'=>-8.914246312801524,
            'longitude'=>13.193036846093097
        
             
          
        ]);

        Casa::create([
            "id" => 6,
            'name' => "Casa média",
            'id_user'=>5,
            'preco'=>14000,
            'id_categoria'=>2,
            'descricao' => "2 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa2.jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>4, //Nambuangongo
            'quartos'=> 2,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'latitude'=>-7.683282978951786,
            'longitude'=>14.001810688700342
             
             
        ]);

        Casa::create([
            "id" => 7,
            'name' => "Casa para alugar",
            'id_user'=>5,
            'preco'=>15000,
            'id_categoria'=>2,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa3.jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=>85, //Luanda
            'quartos'=> 4,
            'id_unidade'=>1,
            'cozinha'=>1,
            'casa_de_banho'=>1,
            'latitude'=>-8.909243434350913,
            'longitude'=>13.192865184724194
            , 
          
           
        ]);
        Casa::create([
            "id" => 8,
            'name' => "Casa no Camama",
            'id_user'=>5,
            'preco'=>12000,
            'id_categoria'=>1,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casa3.jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>2, // Ambriz
            'quartos'=> 4,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'plano'=>1,
            'latitude'=>-7.877110015217037,
            'longitude'=>13.128188707334752
          
        ]);
    }
}