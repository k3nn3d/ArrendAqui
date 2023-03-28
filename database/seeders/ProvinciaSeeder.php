<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        $dados = [
			[
			  "id"=> 1403,
			  "name"=> "Benguela",
			
			],
			[
			  "id"=> 1402,
			  "name"=> "Bengo",
			
			],
			[
			  "id"=> 1404,
			  "name"=> "Bié",
			 
			],
			[
			  "id"=> 1405,
			  "name"=> "Cabinda",
			
			],
			[
			  "id"=> 1407,
			  "name"=> "Cunene",
			  
			],
			[
			  "id"=> 1406,
			  "name"=> "Cuando-Cubango",
			  
			],
			[
			  "id"=> 1410,
			  "name"=> "Kwanza-Norte",
			
			],
			[
			  "id"=> 1411,
			  "name"=> "Kwanza-Sul",
		
			],
			[
			  "id"=> 1394,
			  "name"=> "Luanda",
			
			],
			[
			  "id"=> 1412,
			  "name"=> "Lunda-Norte",
			
			],
			[
			  "id"=> 1413,
			  "name"=> "Lunda-Sul",
			
			],
			[
			  "id"=> 1414,
			  "name"=> "Malanje",
			 
			],
			[
			  "id"=> 1415,
			  "name"=> "Moxico",
			
			],
			
			[
			  "id"=> 1416,
			  "name"=> "Namibe",
			
			],
			[
			  "id"=> 1417,
			  "name"=> "Uíge",
			  
			],
			[
			  "id"=> 1418,
			  "name"=> "Zaire",
			
			],
			[
				"id"=> 1548,
				"name"=> "__OUTRO",
				
			],
		];
        foreach ($dados as $key => $value) {
        	provincia::create($value);
        }

    }
}
