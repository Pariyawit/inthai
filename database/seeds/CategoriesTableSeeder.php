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
            'title' => "Entrée"
        ]);
        DB::table('categories')->insert([
            'title' => "In Thai House"
        ]);
        DB::table('categories')->insert([
            'title' => "Curries"
        ]);
        DB::table('categories')->insert([
            'title' => "Rice"
        ]);
        DB::table('categories')->insert([
            'title' => "Friend Rice"
        ]);
        DB::table('categories')->insert([
            'title' => "Stir Fried"
        ]);
    }
}
