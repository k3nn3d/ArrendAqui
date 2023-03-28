<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\municipio;

class MunicipioSeeder extends Seeder
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
			  "id"=> 1,
			  "name"=> "Dembos",
			  "id_provincia"=> 1402
			],
			[
			  "id"=> 2,
			  "name"=> "Ambriz",
			  "id_provincia"=> 1402
			],
			[
			  "id"=> 3,
			  "name"=> "Dande",
			  "id_provincia"=> 1402
			],
			[
			  "id"=> 4,
			  "name"=> "Nambuangongo",
			  "id_provincia"=> 1402
			],
			[
			  "id"=> 5,
			  "name"=> "Pango Aluquém",
			  "id_provincia"=> 1402
			],
			[
			  "id"=> 6,
			  "name"=> "Baía Farta",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 7,
			  "name"=> "Benguela",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 8,
			  "name"=> "Bocoio",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 9,
			  "name"=> "Caimbambo",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 10,
			  "name"=> "Chongoroi",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 11,
			  "name"=> "Cubal",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 12,
			  "name"=> "Ganda",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 13,
			  "name"=> "Lobito",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 14,
			  "name"=> "Catabola",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 15,
			  "name"=> "Chinguar",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 16,
			  "name"=> "Chitembo",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 17,
			  "name"=> "Cuembo",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 18,
			  "name"=> "Cunhinga",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 19,
			  "name"=> "Kuito",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 20,
			  "name"=> "Nharea",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 21,
			  "name"=> "Buco-Zau",
			  "id_provincia"=> 1405
			],
			[
			  "id"=> 22,
			  "name"=> "Cabinda",
			  "id_provincia"=> 1405
			],
			[
			  "id"=> 23,
			  "name"=> "Cacongo",
			  "id_provincia"=> 1405
			],
			[
			  "id"=> 24,
			  "name"=> "Cahama",
			  "id_provincia"=> 1407
			],
			[
			  "id"=> 25,
			  "name"=> "Cuangar",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 26,
			  "name"=> "Cuchi",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 27,
			  "name"=> "Dirico",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 28,
			  "name"=> "Longa",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 29,
			  "name"=> "Mavinga",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 30,
			  "name"=> "Menongue",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 31,
			  "name"=> "Rivungo",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 32,
			  "name"=> "Bailundo",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 33,
			  "name"=> "Cuanhama",
			  "id_provincia"=> 1407
			],
			[
			  "id"=> 34,
			  "name"=> "Curoca",
			  "id_provincia"=> 1407
			],
			[
			  "id"=> 35,
			  "name"=> "Cuvelai",
			  "id_provincia"=> 1407
			],
			[
			  "id"=> 36,
			  "name"=> "Namacunde",
			  "id_provincia"=> 1407
			],
			[
			  "id"=> 37,
			  "name"=> "Ombadja",
			  "id_provincia"=> 1407
			],
			[
			  "id"=> 38,
			  "name"=> "Catchiungo",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 39,
			  "name"=> "Ekunha",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 40,
			  "name"=> "Huambo",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 41,
			  "name"=> "Londuimbale",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 42,
			  "name"=> "Longonjo",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 43,
			  "name"=> "Mungo",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 44,
			  "name"=> "Tchicala-Tcholoanga",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 45,
			  "name"=> "Tchindjenje",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 46,
			  "name"=> "Ucuma",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 47,
			  "name"=> "Ambaca",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 48,
			  "name"=> "Caluquembe",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 49,
			  "name"=> "Chiange",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 50,
			  "name"=> "Chibia",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 51,
			  "name"=> "Chicomba",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 52,
			  "name"=> "Chipindo",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 53,
			  "name"=> "Cacula",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 54,
			  "name"=> "Humpata",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 55,
			  "name"=> "Jamba",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 56,
			  "name"=> "Lubango",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 57,
			  "name"=> "Matala",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 58,
			  "name"=> "Quilengues",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 59,
			  "name"=> "Amboim",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 60,
			  "name"=> "Banga",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 61,
			  "name"=> "Bolongongo",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 62,
			  "name"=> "Cambambe",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 63,
			  "name"=> "Cazengo",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 64,
			  "name"=> "Golungo Alto",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 65,
			  "name"=> "Gonguembo",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 66,
			  "name"=> "Lucala",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 67,
			  "name"=> "Quiculungo",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 68,
			  "name"=> "Samba Caju",
			  "id_provincia"=> 1410
			],
			[
			  "id"=> 69,
			  "name"=> "Belas",
			  "id_provincia"=> 1394
			],
			[
			  "id"=> 70,
			  "name"=> "Cassongue",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 71,
			  "name"=> "Conda",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 72,
			  "name"=> "Ebo",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 73,
			  "name"=> "Libolo",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 74,
			  "name"=> "Mussende",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 75,
			  "name"=> "Porto Amboim",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 76,
			  "name"=> "Quibala",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 77,
			  "name"=> "Quilenda",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 78,
			  "name"=> "Seles",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 79,
			  "name"=> "Sumbe",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 80,
			  "name"=> "Quiçama",
			  "id_provincia"=> 1394
			],
			[
			  "id"=> 81,
			  "name"=> "Cacuaco",
			  "id_provincia"=> 1394
			],
			[
			  "id"=> 82,
			  "name"=> "Cambulo",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 83,
			  "name"=> "Cazenga",
			  "id_provincia"=> 1394
			],
			[
			  "id"=> 84,
			  "name"=> "Icole e Bengo",
			  "id_provincia"=> 1394
			],
			[
			  "id"=> 85,
			  "name"=> "Luanda",
			  "id_provincia"=> 1394
			],
			[
			  "id"=> 86,
			  "name"=> "Viana",
			  "id_provincia"=> 1394
			],
			[
			  "id"=> 87,
			  "name"=> "Cacolo",
			  "id_provincia"=> 1413
			],
			[
			  "id"=> 88,
			  "name"=> "Capenda-Camulemba",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 89,
			  "name"=> "Chitato",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 90,
			  "name"=> "Cuilo",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 91,
			  "name"=> "Lubalo",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 92,
			  "name"=> "Lucapa",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 93,
			  "name"=> "Xá-Muteba",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 94,
			  "name"=> "Cacuso",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 95,
			  "name"=> "Dala",
			  "id_provincia"=> 1413
			],
			[
			  "id"=> 96,
			  "name"=> "Muconda",
			  "id_provincia"=> 1413
			],
			[
			  "id"=> 97,
			  "name"=> "Saurimo",
			  "id_provincia"=> 1413
			],
			[
			  "id"=> 98,
			  "name"=> "Alto Zambeze",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 99,
			  "name"=> "Cambundi-Catembo",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 100,
			  "name"=> "Cangandala",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 101,
			  "name"=> "Caombo",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 102,
			  "name"=> "Cuaba Nzogo",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 103,
			  "name"=> "Cunda-Diaza",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 104,
			  "name"=> "Luquembo",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 105,
			  "name"=> "Malanje",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 106,
			  "name"=> "Marimba",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 107,
			  "name"=> "Bundas",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 108,
			  "name"=> "Camanongue",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 109,
			  "name"=> "Léua",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 110,
			  "name"=> "Lucano",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 111,
			  "name"=> "Luau",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 112,
			  "name"=> "Moxico",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 113,
			  "name"=> "Camuculo",
			  "id_provincia"=> 1416
			],
			[
			  "id"=> 114,
			  "name"=> "Namibe",
			  "id_provincia"=> 1416
			],
			[
			  "id"=> 115,
			  "name"=> "Tômbua",
			  "id_provincia"=> 1416
			],
			[
			  "id"=> 116,
			  "name"=> "Virei",
			  "id_provincia"=> 1416
			],
			[
			  "id"=> 117,
			  "name"=> "Bembe",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 118,
			  "name"=> "Buengas",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 119,
			  "name"=> "Bungo",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 120,
			  "name"=> "Cuimba",
			  "id_provincia"=> 1418
			],
			[
			  "id"=> 121,
			  "name"=> "Damba",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 122,
			  "name"=> "Macocola",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 123,
			  "name"=> "Mucaba",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 124,
			  "name"=> "Negage",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 125,
			  "name"=> "Puri",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 126,
			  "name"=> "Quimbele",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 127,
			  "name"=> "Quitexe",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 128,
			  "name"=> "Sanza Pombo",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 129,
			  "name"=> "Uíge",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 130,
			  "name"=> "Noqui",
			  "id_provincia"=> 1418
			],
			[
			  "id"=> 131,
			  "name"=> "Nzeto",
			  "id_provincia"=> 1418
			],
			[
			  "id"=> 132,
			  "name"=> "Soyo",
			  "id_provincia"=> 1418
			],
			[
			  "id"=> 133,
			  "name"=> "Tomboco",
			  "id_provincia"=> 1418
			],
			[
			  "id"=> 134,
			  "name"=> "Bula Atumba",
			  "id_provincia"=> 1402
			],
			[
			  "id"=> 135,
			  "name"=> "Andulo",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 136,
			  "name"=> "Catumbela",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 137,
			  "name"=> "Belize",
			  "id_provincia"=> 1405
			],
			[
			  "id"=> 138,
			  "name"=> "Camacupa",
			  "id_provincia"=> 1404
			],
			[
			  "id"=> 139,
			  "name"=> "Cuito Cuanavale",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 140,
			  "name"=> "Caungula",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 141,
			  "name"=> "Caála",
			  "id_provincia"=> 1408
			],
			[
			  "id"=> 142,
			  "name"=> "Balombo",
			  "id_provincia"=> 1403
			],
			[
			  "id"=> 143,
			  "name"=> "Calai",
			  "id_provincia"=> 1406
			],
			[
			  "id"=> 144,
			  "name"=> "Cuango",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 145,
			  "name"=> "Massango",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 146,
			  "name"=> "Caculama-Mucari",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 147,
			  "name"=> "Quirima",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 148,
			  "name"=> "Calandula",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 149,
			  "name"=> "Luchazes",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 150,
			  "name"=> "Bibala",
			  "id_provincia"=> 1416
            ],
		

			[
			  "id"=> 152,
			  "name"=> "Maquela do Zombo",
			  "id_provincia"=> 1417
            ],
			[
			  "id"=> 153,
			  "name"=> "M'Banza Kongo",
			  "id_provincia"=> 1418
			],
			[
			  "id"=> 154,
			  "name"=> "Caungo",
			  "id_provincia"=> 1412
			],
			[
			  "id"=> 155,
			  "name"=> "Ambuíla",
			  "id_provincia"=> 1417
			],
			[
			  "id"=> 156,
			  "name"=> "Cameia",
			  "id_provincia"=> 1415
			],
			[
			  "id"=> 157,
			  "name"=> "Quela",
			  "id_provincia"=> 1414
			],
			[
			  "id"=> 158,
			  "name"=> "Waku Kungo",
			  "id_provincia"=> 1411
			],
			[
			  "id"=> 159,
			  "name"=> "Quipungo",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 160,
			  "name"=> "Caconda",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 161,
			  "name"=> "Kuvango",
			  "id_provincia"=> 1409
			],
			[
			  "id"=> 162,
			  "name"=> "Alto Cauale",
			  "id_provincia"=> 1417
			],
			[
				"id"=> 163,
				"name"=> "__aUTRO",
				"id_provincia"=> 1417
            ],
              [
                "id"=> 151,
                "name"=> "Songo",
                "id_provincia"=> 1417			
              ],
		];
		
        foreach ($dados as $key => $value){
        	municipio::create($value);
        }
    }
}
