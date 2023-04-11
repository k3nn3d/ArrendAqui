<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            
            
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 3,
            'name' => "Cátia",
            'lastname'=>"Faria",
            'username'=>"cati",
            'email' => "catia@gmail.com",
            'vc_tipo_utilizador' => 3,
            'vc_path' => "imagens/user.png",
            
            
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 4,
            'name' => "António",
            'lastname'=>"José",
            'username'=>"toni",
            'email' => "toni@gmail.com",
            'vc_tipo_utilizador' => 4,
            'vc_path' => "imagens/user.png",
            
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 5,
            'name' => "Letícia",
            'lastname'=>"Kawanda",
            'username'=>"leti",
            'email' => "leticia@gmail.com",
            'vc_tipo_utilizador' => 5,
            'vc_path' => "imagens/user.png",
            
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 6,
            'name' => "António",
            'lastname'=>"Cavunga",
            'username'=>"tonio",
            'email' => "antoni@gmail.com",
            'vc_tipo_utilizador' => 6,
            'vc_path' => "imagens/user.png",
            
            'password' => Hash::make("12345678")
        ]);

        User::create([
            "id" => 7,
            'name' => "Fiona",
            'lastname'=>"Armando",
            'username'=>"fiona",
            'email' => "fiona@gmail.com",
            'vc_tipo_utilizador' => 6,
            'vc_path' => "imagens/user.png",
            
            'password' => Hash::make("12345678")
        ]);
        User::create([
            "id" => 8,
            'name' => "Ana",
            'lastname'=>"Fontes",
            'username'=>"ana",
            'email' => "ana@gmail.com",
            'vc_tipo_utilizador' => 5,
            'vc_path' => "imagens/user.png",
            
            'password' => Hash::make("12345678")
        ]);
        User::create([
            "id" => 9,
            'name' => "Filomeno",
            'lastname'=>"Cavinte",
            'username'=>"filo",
            'email' => "filomneno@gmail.com",
            'vc_tipo_utilizador' => 5,
            'vc_path' => "imagens/user.png",
            
            'password' => Hash::make("12345678")
        ]);
    }

   
}
