<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\afiliado;

class afiliadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        afiliado::create([
            'valor'=>30,
        ]);
    }
}
