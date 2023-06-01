<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carro;

class CarroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carro::create([
            "id" => 1,
            'modelo' => "Dyna 150",
            'marca'=>"Toyota",
            'id_user'=>3,
            'lugares' => "2",
            'preco'=>"1000",
            'espaco'=>"5x6",
            'vc_path' => "imagens/carro.3.jpeg",
          
        ]);

        Carro::create([
            "id" => 2,
            'modelo' => "Dyna 250",
            'marca'=>"Toyota",
            'id_user'=>5,
            'lugares' => "3",
            'preco'=>"2000",
            'espaco'=>"6x9",
            'vc_path' => "imagens/carro.2.jpeg",
          
        ]);

        Carro::create([
            "id" => 3,
            'modelo' => "Dyna 150",
            'marca'=>"Toyota",
            'id_user'=>5,
            'lugares' => "2",
            'preco'=>"1000",
            'espaco'=>"5x6",
            'vc_path' => "imagens/carro.4.jpeg",
          
        ]);

        Carro::create([
            "id" => 4,
            'modelo' => "Dyna 250",
            'marca'=>"Toyota",
            'id_user'=>4,
            'lugares' => "4",
            'preco'=>"1000",
            'espaco'=>"4x6",
            'vc_path' => "imagens/carro.jpeg",
          

        ]);

        Carro::create([
            "id" => 5,
            'modelo' => "Dyna 250",
            'marca'=>"Toyota",
            'id_user'=>3,
            'lugares' => "2",
            'preco'=>"1000",
            'espaco'=>"5x6",
            'vc_path' => "imagens/carro.3.jpeg",
          
        ]);

        Carro::create([
            "id" => 6,
            'modelo' => "Dyna 150",
            'marca'=>"Toyota",
            'id_user'=>5,
            'lugares' => "2",
            'preco'=>"1000",
            'espaco'=>"5x6",
            'vc_path' => "imagens/carro.2.jpeg",
        ]);

        Carro::create([
            "id" => 7,
            'modelo' => "TGL",
            'marca'=>"Toyota",
            'id_user'=>3,
            'lugares' => "3",
            'preco'=>"1000",
            'espaco'=>"5x6",
            'vc_path' => "imagens/carro.jpeg",
          
           
        ]);

        //
    }
}
