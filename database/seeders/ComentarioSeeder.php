<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
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
                "id_user"=> "7",
                "estrelas" => 4,
                "conteudo"=> "Gostei muito da iniciativa. Dá próxima vez que quiser uma casa alugo aqui.kkk",
                
            ],
            [
                "id"=> 2,
                "id_user"=> "6",
                "estrelas" => 5,
                "conteudo"=> "Não tive que sair andando pela rua sem rumo à procura de uma casa para arrendar. Peguei no meu telefone e rapidamente achei. Muito bom",
                
            ],
            [
                "id"=> 3,
                "id_user"=> "9",
                "estrelas" => 5,
                "conteudo"=> "Tenho salão de festas, cadastrei no Alug'aqui e tenho tido um número maior de clientes. As reservas estão a bombar",
                
            ],
            [
                "id"=> 4,
                "id_user"=> "8",
                "estrelas" => 4,
                "conteudo"=> "É uma ótima iniciativa dada a realidade do país e a necessidade das pessoas de adquirir uma casa temporária ou só um espaço para lazer ou começar um negócio. Facilitou-me a vida.",
                
            ],
            [
                "id"=> 5,
                "id_user"=> "7",
                "estrelas" => 3,
                "conteudo"=> "Consegui achar uma casa a um preço que não pesa o meu bolso em uma ótima zona. É realmente bom o site poder aproximar quem disponibiliza à quem procura.",
                
            ],
            [
                "id"=> 6,
                "id_user"=> "8",
                "estrelas" => 5,
                "conteudo"=> "Tem um painel que me ajuda a controlar quanto de aderência meus imóveis têm, quantos aluguei e tudo mais. É muito bom o site.",
                
              ]
        ];
        
        foreach ($dados as $key => $value){
            Comentario::create($value);
        }
    }
}
