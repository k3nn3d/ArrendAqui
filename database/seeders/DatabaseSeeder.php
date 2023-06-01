<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
       
         $this->call([
          
            UserSeeder::class,
            Sub_CategoriaSeeder::class,
            MunicipioSeeder::class,
            ProvinciaSeeder::class,
            CategoriaSeeder::class,
            CarroSeeder::class, 
            CasaSeeder::class,
            ComentarioSeeder::class,
            UnidadeSeeder::class,
            motoristaSeeder::class,
            afiliadoSeeder::class, 


          
           
          
        ]);
    }
}
