<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Unidade::create([
            "id" => 1,
            'name' => "mês",
            
        ]);
        Unidade::create([
            "id" => 2,
            'name' => "semestre",
            
        ]);

    }
}
