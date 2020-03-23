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
            'title' => "Entrée",
            'sort'=>0
        ]);
        DB::table('categories')->insert([
            'title' => "In Thai House",
            'sort'=>1
        ]);
        DB::table('categories')->insert([
            'title' => "Curries",
            'description' => "A choice of vegetable, tofu, chicken, beef, pork, barramundi fillet, duck or prawns.",
            'sort'=>2
        ]);
        DB::table('categories')->insert([
            'title' => "Rice",
            'sort'=>3
        ]);
        // DB::table('categories')->insert([
        //     'title' => "Friend Rice"
        // ]);
        // DB::table('categories')->insert([
        //     'title' => "Stir Fried"
        // ]);
    }
}
