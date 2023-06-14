<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         /* ==Níveis de Acesso==
         * 1-Administrador
         * 2-Gerente
         * 3-Motorista
         * 4-Afiliado
         * 5-Senhorio
         * 6-Cliente
         */

       

        User::create([
            "id" => 1,
            'name' => "Amdinistrador",
            'lastname'=>"do Sistema",
            'username'=>"admin",
            'email' => "admin@gmail.com",
            'vc_tipo_utilizador' => 1,
            'vc_path' => "imagens/user.png",
            'telefone'=>'937539143',
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 2,
            'name' => "Donilson",
            'lastname'=>"Da Costa",
            'username'=>"doni",
            'email' => "doni@gmail.com",
            'vc_tipo_utilizador' => 2,
            'vc_path' =>"imagens/user.png",
            'telefone'=>'937539143',
            
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 3,
            'name' => "Telma",
            'lastname'=>"Damião",
            'username'=>"telma",
            'email' => "telma@gmail.com",
            'vc_tipo_utilizador' => 3,
            'vc_path' => "imagens/user.png",
            'telefone'=>'937539143',
            'carta'=>'pdf/casa/propriedade/document.pdf',
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 4,
            'name' => "Helder",
            'lastname'=>"Cambuta",
            'username'=>"helder",
            'email' => "helder@gmail.com",
            'vc_tipo_utilizador' => 3,
            'telefone'=>'937539143',
            'vc_path' => "imagens/user.png",
            'carta'=>'pdf/casa/propriedade/document.pdf',
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 5,
            'name' => "Inácio",
            'lastname'=>"Rodrigues",
            'username'=>"inacio",
            'email' => "inacio@gmail.com",
            'vc_tipo_utilizador' => 3,
            'telefone'=>'937539143',
            'vc_path' => "imagens/user.png",
            'carta'=>'pdf/casa/propriedade/document.pdf',
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 6,
            'name' => "Etiandra",
            'lastname'=>"Dos Anjos",
            'username'=>"etiandra",
            'email' => "antoni@gmail.com",
            'vc_tipo_utilizador' => 5,
            'vc_path' => "imagens/user.png",
            'telefone'=>'937539143',
            'biografia'=>'Confiaça no futuro!',
            'bi'=>'pdf/casa/propriedade/document.pdf',
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 7,
            'name' => "Sara",
            'lastname'=>"Paulo",
            'username'=>"sara",
            'email' => "sara@gmail.com",
            'vc_tipo_utilizador' => 5,
            'telefone'=>'937539143',
            'vc_path' => "imagens/user.png",
            'biografia'=>'Arrende uma casa e realize o sonho de ter um teto',
            'bi'=>'pdf/casa/propriedade/document.pdf',
            'password' => Hash::make("12345678")
        ]);
        User::create([
            "id" => 8,
            'name' => "Manuel",
            'lastname'=>"Luvuvamo",
            'username'=>"manuel",
            'email' => "manuel@gmail.com",
            'vc_tipo_utilizador' => 5,
            'vc_path' => "imagens/user.png",
            'biografia'=>"Olá, estou no Arrend'Aqui",
            'telefone'=>'937539143',
            'bi'=>'pdf/casa/propriedade/document.pdf',
            'password' => Hash::make("12345678")
        ]);
        User::create([
            "id" => 9,
            'name' => "Gomes",
            'lastname'=>"Mateus",
            'username'=>"gomes",
            'email' => "filomneno@gmail.com",
            'vc_tipo_utilizador' => 5,
            'biografia'=>'Arrende esta casa e ganhe muitos outros privilégios',
            'telefone'=>'937539143',
            'vc_path' => "imagens/user.png",
            'bi'=>'pdf/casa/propriedade/document.pdf',
            'password' => Hash::make("12345678")
        ]);
        $user1= User::create([
            "id" => 10,
            'name' => "Jilião",
            'lastname'=>"Alberto",
            'username'=>"juliao",
            'email' => "juliao@gmail.com",
            'vc_tipo_utilizador' => 6,
            'pontos'=>700,
            'telefone'=>'937539143',
            'vc_path' => "imagens/user.png",
            'convite'=>$this->gerarTokenUnico(),
            
            'password' => Hash::make("12345678")
        ]);
        $user1->update([
            'link'=>"register$user1->convite"
        ]);
        $user2=User::create([
            "id" => 11,
            'name' => "Almiro",
            'lastname'=>"Barata",
            'username'=>"almiro",
            'link'=>'register/',
            'telefone'=>'937539143',
            'email' => "leonel@gmail.com",
            'vc_tipo_utilizador' => 6,
            'vc_path' => "imagens/user.png",
            'convite'=>$this->gerarTokenUnico(),
            'password' => Hash::make("12345678")
        ]);
        $user2->update([
            'link'=>"register$user2->convite"
        ]);
        $user3=User::create([
            "id" => 12,
            'name' => "Ladislau",
            'lastname'=>"Generoso",
            'username'=>"ladi",
            'link'=>'register/',
            'telefone'=>'937539143',
            'pontos'=>500,
            'email' => "ladislau@gmail.com",
            'vc_tipo_utilizador' => 6,
            'vc_path' => "imagens/user.png",
            'convite'=>$this->gerarTokenUnico(),
            'password' => Hash::make("12345678")
        ]);
        $user3->update([
            'link'=>"register$user3->convite"
        ]);
    }

    public function gerarTokenUnico()
    {
        $token = Str::random(20); // Gera uma string aleatória de 32 caracteres
    
        // Verifica se o token já existe no banco de dados
        while (User::where('convite', $token)->exists()) {
            $token = Str::random(20); // Gera um novo token
        }
    
        return $token;
    }
 
   
}
