<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\motorista;

class motoristaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        motorista::create([
            'valor'=>4,
        ]);
    }
}
