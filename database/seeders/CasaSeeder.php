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
            'bairro' => "Grafanil Bar",
            'id_user'=>6,
            'preco'=>15000,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/armazem_1(3).jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=>86, //Viana
            'quartos'=> 4,
            'cozinha'=>1,
            'casa_de_banho'=>1,
            'id_categoria'=>2,
            'id_unidade'=>4,
            'plano'=>3,
            'estado'=>'pendente',
            'latitude'=>-8.907870,
            'longitude'=>13.363460,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
        ]);

        Casa::create([
            "id" => 2,
            'bairro' => "",
            'id_user'=>7,
            'preco'=>15000,
            'descricao' => "7 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/casa_2(6).jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>4, //Nambuangongo
            'quartos'=> 7,
            'id_categoria'=>1,
            'cozinha'=>1,
            'id_unidade'=>3,
            'casa_de_banho'=>1,
            'plano'=>3,
            'estado'=>'pendente',
            'latitude'=>-7.994902696550908,
            'longitude'=>14.126801365779613,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
        ]);

        Casa::create([
            "id" => 3,
            'bairro' => "Alsimba Comercial",
            'id_user'=>8,
            'id_categoria'=>1,
            'preco'=>16000,
            'descricao' => "5 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/casa_7(1).jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>2, // Ambriz
            'quartos'=> 5,
            'cozinha'=>1,
            'id_unidade'=>2,
            'casa_de_banho'=>1,
            'estado'=>'publicado',
            'latitude'=>-7.847904686120925, 
            'longitude'=>13.114401352784753,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
            
            
          
        ]);

        Casa::create([
            "id" => 4,
            'bairro' => "Hoji ya Henda",
            'id_user'=>9,
            'id_categoria'=>2,
            'preco'=>10000,
            'descricao' => "1 quarto, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/armazem_3(7).jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=> 83, //Cazenga
            'quartos'=> 1,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'estado'=>'publicado',
            'latitude'=>-8.803536480786056, 
            'longitude'=>13.296391394860793,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
             

        ]);

        Casa::create([
            "id" => 5,
            'bairro' => "Benfica",
            'id_user'=>9,
            'preco'=>25000,
            'descricao' => "3 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/casa_10(6).jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=>85, //Luanda
            'quartos'=> 3,
            'id_categoria'=>1,
            'cozinha'=>1,
            'casa_de_banho'=>1,
            'id_unidade'=>4,
            'estado'=>'publicado',
            'plano'=>2,
            'latitude'=>-8.955948055408264,
            'longitude'=> 13.189510716488908,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
        
             
          
        ]);

        Casa::create([
            "id" => 6,
            'bairro' => "Camama",
            'id_user'=>6,
            'preco'=>14000,
            'id_categoria'=>3,
            'descricao' => "2 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/escritorio_2(4).jpg",
            'id_provincia'=> 1394, //Luanda
            'id_municipio'=>69, //BelaS
            'quartos'=> 2,
            'cozinha'=>1,
            'id_unidade'=>3,
            'casa_de_banho'=>1,
            'estado'=>'publicado',
            'latitude'=>-8.917686758887678,
            'longitude'=> 13.261252690520209,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
             
             
        ]);

        Casa::create([
            "id" => 7,
            'bairro' => "Sequele",
            'id_user'=>7,
            'preco'=>15000,
            'id_categoria'=>5,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/loja_2(1).jpg",
            'id_provincia'=>1394, //Luanda
            'id_municipio'=>81, //Cacuaco
            'quartos'=> 4,
            'id_unidade'=>2,
            'cozinha'=>1,
            'estado'=>'publicado',
            'casa_de_banho'=>1,
            'latitude'=>-8.802350217892032, 
            'longitude'=>13.37430268166222
            , 'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
           
        ]);
        Casa::create([
            "id" => 8,
            'bairro' => "Bela Vista",
            'id_user'=>8,
            'preco'=>12000,
            'id_categoria'=>5,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/loja_3(5).jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>2, // Ambriz
            'quartos'=> 4,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'plano'=>1,
            'estado'=>'publicado',
            'latitude'=>-7.877110015217037,
            'longitude'=>13.128188707334752,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
        ]);


        Casa::create([
            "id" => 9,
            'bairro' => "Bombas de combustível",
            'id_user'=>8,
            'preco'=>30000,
            'id_categoria'=>3,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/escritorio_3(1).jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>2, // Ambriz
            'quartos'=> 4,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'plano'=>1,
            'estado'=>'publicado',
            'latitude'=>-7.8413143605822455,
            'longitude'=> 13.104766580228274,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
        ]);

        Casa::create([
            "id" => 10,
            'bairro' => "Cidade de Ambriz",
            'id_user'=>8,
            'preco'=>30000,
            'id_categoria'=>5,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/loja_4(3).jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>2, // Ambriz
            'quartos'=> 4,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'plano'=>1,
            'estado'=>'publicado',
            'latitude'=>-7.858575063384138, 
            'longitude'=>13.113597490978018,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
        ]);

        Casa::create([
            "id" => 11,
            'bairro' => "Cidade de Ambriz",
            'id_user'=>8,
            'preco'=>30000,
            'id_categoria'=>1,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/casa_11(7).jpg",
            'id_provincia'=> 1402, //Bengo
            'id_municipio'=>2, // Ambriz
            'quartos'=> 4,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'plano'=>1,
            'estado'=>'publicado',
            'latitude'=>-7.869628116047625, 
            'longitude'=>13.127158739121336,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
        ]);

        Casa::create([
            "id" => 12,
            'bairro' => "Maianga",
            'id_user'=>8,
            'preco'=>30000,
            'id_categoria'=>4,
            'descricao' => "4 quartos, uma casa de banho, uma sala, uma cozinha",
            'vc_path' => "imagens/casas/festa_1(2).jpg",
            'id_provincia'=> 1394, //Luanda
            'id_municipio'=>85, // Luanda
            'quartos'=> 4,
            'cozinha'=>1,
            'id_unidade'=>1,
            'casa_de_banho'=>1,
            'plano'=>1,
            'estado'=>'publicado',
            'latitude'=>-8.849089616829454,
            'longitude'=> 13.234773438975582,
            'planta'=>'pdf/casa/planta/document.pdf',
            'propriedade'=>'pdf/casa/propriedade/document.pdf'
          
        ]);
    }
}
