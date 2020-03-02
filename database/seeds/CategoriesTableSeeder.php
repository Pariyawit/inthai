<?php

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
        DB::table('categories')->insert([
            'restaurant_id' => 1,
            'title' => "Entrée"
        ]);
        DB::table('categories')->insert([
            'restaurant_id' => 1,
            'title' => "In Thai House"
        ]);
        DB::table('categories')->insert([
            'restaurant_id' => 1,
            'title' => "Curries"
        ]);
        DB::table('categories')->insert([
            'restaurant_id' => 1,
            'title' => "Rice"
        ]);
        DB::table('categories')->insert([
            'restaurant_id' => 1,
            'title' => "Friend Rice"
        ]);
        DB::table('categories')->insert([
            'restaurant_id' => 1,
            'title' => "Stir Fried"
        ]);
    }
}
