<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'category_id' => 1,
            'title' => "Vegetable Spring Roll (4 Pieces)",
            'price' => 8.5,
            'vegetarian' => true,
            'sort'=>0
        ]);
        DB::table('items')->insert([
            'category_id' => 1,
            'title' => "Vegetable Curry Puff (4 Pieces)",
            'price' => 8.5,
            'vegetarian' => true,
            'sort'=>1
        ]);
        DB::table('items')->insert([
            'category_id' => 1,
            'title' => "Fish Cake (4 Pieces)",
            'price' => 8.5,
            'sort'=>2
        ]);
        DB::table('items')->insert([
            'category_id' => 1,
            'title' => "Money Bag",
            'description' => "Chicken, crab meat, peas and coconut wrapped in pastry served with sweet chilli sauce.",
            'price' => 8.5,
            'sort'=>3
            
        ]);

        DB::table('items')->insert([
            'category_id' => 2,
            'title' => "Bangkok Omelette (GF)",
            'description' => "Thai omelette with diced bacon, mix vegetable and shallot.",
            'price' => 15.5,
            'sort'=>4
        ]);
        DB::table('items')->insert([
            'category_id' => 2,
            'title' => "Pra Ram Long Song (GF)",
            'description' => "Steamed mixed vegetable, tofu and peanut sauce.",
            'price' => 16.5,
            'vegetarian' => true,
            'sort'=>5
        ]);
        DB::table('items')->insert([
            'category_id' => 2,
            'title' => "Asian Green",
            'description' => "Stir fried mix green vegetable with oyster sauce.",
            'price' => 16.5,
            'vegetarian' => true,
            'sort'=>6
        ]);

        DB::table('items')->insert([
          'category_id' => 3,
          'title' => "Panang Curry",
          'description' => "Thai medium hot curry with carrot and pumpkin.",
          'price' => 16.5,
          'sort'=>7
        ]);
        DB::table('items')->insert([
          'category_id' => 3,
        'title' =>	'Red Curry',
        'description' =>	"Thai red hot curry with sliced bamboo, beans, capsicum and basil.",
        "price" =>	16.50,
        'sort'=>8
        ]);
        DB::table('items')->insert([
          'category_id' => 3,
          'title' =>	'Green Curry',
          'description' =>	"Thai hot curry with sliced bamboo, beans, capsicum and basil.",
          "price" =>	16.50,
          'sort'=>9
        ]);
        DB::table('items')->insert([
          'category_id' => 3,
          'title' =>	'Yellow Curry',
          'description' =>	"Thai mild curry with potato, onion and carrot.",
          "price" =>	16.50,
          'sort'=>10
        ]);

        DB::table('items')->insert([
        'category_id' => 4,
        'title' =>	'Rice (Small)',
        "price" =>	4.5,
        'sort'=>11
        ]);

        DB::table('items')->insert([
          'category_id' => 4,
        'title' =>	'Rice (Large)',
        "price" =>	5.5,
        'sort'=>12
        ]);

    }
}
