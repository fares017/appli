<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // for($i=0 ; $i < 30 ; $i++){
        //     Product::create([
        //         "title" => $faker->sentence(3),
        //         "slug" => $faker->slug,
        //         "subtitle" => $faker->sentence(5),
        //         "description" => $faker->text,
        //         "price" => $faker->numberBetween(15, 300)*100,
        //         "image" => "./img/product03.png"
        //     ])->Categories()->attach([
        //           rand(1,4),
        //           rand(1,4)
        //     ]);

        // }

      
        Product::create([
            "title" => "Cartes Graphiques Asus GTX1650 4GB TUF Gaming O4GD6",
            "slug" => "cartes-graphiques-asus-gtx1650-4gb-tuf-gaming-o4gd6",
            "subtitle" => "cartes-graphiques-asus-gtx1650-4gb-tuf-gaming-o4gd6",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 5
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);
        Product::create([
            "title" => "CRAM Gigabyte Aorus RGB, DDR4-4400, CL19 – 16 GB, Black",
            "slug" => "RAM Gigabyte Aorus RGB, DDR4-4400, CL19 – 16 GB, Black",
            "subtitle" => "RAM Gigabyte Aorus RGB, DDR4-4400, CL19 – 16 GB, Black",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 0
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);

        Product::create([
            "title" => "Souris Ducky Feather Gaming , ARGB – Black",
            "slug" => "Souris Ducky Feather Gaming , ARGB – Black",
            "subtitle" => "Souris Ducky Feather Gaming , ARGB – Black",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 4
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);

        Product::create([
            "title" => "SSD NVMe Gigabyte Aorus , PCIe 3.0 M.2 Typ 2280 – 512 GB",
            "slug" => "SSD NVMe Gigabyte Aorus , PCIe 3.0 M.2 Typ 2280 – 512 GB",
            "subtitle" => "SSD NVMe Gigabyte Aorus , PCIe 3.0 M.2 Typ 2280 – 512 GB",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 0
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);
       
        

  Product::create([
            "title" => "Ventilateur Corsair Air A500 – 120mm",
            "slug" => "Ventilateur Corsair Air A500 – 120mm",
            "subtitle" => "Ventilateur Corsair Air A500 – 120mm",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 2
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);
       

        Product::create([
            "title" => "REFOROIDISSEMENT LIQUID Lian Li GALAHAD 240 Komplett-, DRGB – Black",
            "slug" => "REFOROIDISSEMENT LIQUID Lian Li GALAHAD 240 Komplett-, DRGB – Black",
            "subtitle" => "REFOROIDISSEMENT LIQUID Lian Li GALAHAD 240 Komplett-, DRGB – Black",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 0
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);
       
        Product::create([
            "title" => "Alimentation Seasonic S12III 80 PLUS Bronze – 500 Watt
            ",
            "slug" => "Alimentation Seasonic S12III 80 PLUS Bronze – 500 Watt",
            "subtitle" => "Alimentation Seasonic S12III 80 PLUS Bronze – 500 Watt",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 5
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);


        Product::create([
            "title" => "Boitier Raijintek PONOS TG4 – Black",
            "slug" => "Boitier Raijintek PONOS TG4 – Black",
            "subtitle" => "Boitier Raijintek PONOS TG4 – Black",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 6
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);


        Product::create([
            "title" => "Gigabyte B550 AORUS ELITE AX V2",
            "slug" => "Gigabyte B550 AORUS ELITE AX V2",
            "subtitle" => "Gigabyte B550 AORUS ELITE AX V2",
            "description" => "Carte graphique NVIDIA GeForce GTX 1650
                            avec horloge de base / boost 1410/1680 MHz
                            GDDR6-VRAM 4 Go avec horloge RAM 12 GHz (effective)
                            conception compacte du refroidisseur à deux ventilateurs",
            "price" => $faker->numberBetween(15, 300)*100,
            "image" => "products\July2021\cYMcILTTHuLgQcAJECA4.jpg",
            "images" =>  json_encode(["products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg",
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg" ,
            "products\July2021\cYMcILTTHuLgQcAJECA4.jpg","products\July2021\JK7iVn4Diit57WhEijgI.jpg"  ]),
            "stock" => 5
        ])->Categories()->attach([
              rand(1,4),
              rand(1,4)
        ]);
















    }
}
