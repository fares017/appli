<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableseeder::class);
    }
}
