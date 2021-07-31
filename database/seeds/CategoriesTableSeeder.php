<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Téléphone',
            'slug' => 'telephone'
        ]);
        
        Category::create([
            'name' => 'PC Portable',
            'slug' => 'pc_potable'
        ]);
        
        Category::create([
            'name' => 'Accésoires',
            'slug' => 'accsesoire'
        ]);
        
        Category::create([
            'name' => 'Head Phone',
            'slug' => 'headphone'
        ]);

        Category::create([
            'name' => 'Montre',
            'slug' => 'montre'
        ]);
    }
}
