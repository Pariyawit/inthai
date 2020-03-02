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

			// $table->bigIncrements('id');
   //          $table->unsignedBigInteger('restaurant_id');
   //          $table->unsignedBigInteger('category_id');

   //          $table->unique('title');
   //          $table->text('description')->nullable();
   //          $table->decimal('price',8,2);
   //          $table->boolean('vegetarian')->default(false);
   //          $table->boolean('sold_out')->default(false);

        DB::table('items')->insert([
            'category_id' => 1,
            'title' => "Vegetable Spring Roll (4 Pieces)",
            'price' => 8.5,
            'vegetarian' => true
        ]);
        DB::table('items')->insert([
            'category_id' => 1,
            'title' => "Vegetable Curry Puff (4 Pieces)",
            'price' => 8.5,
            'vegetarian' => true
        ]);
        DB::table('items')->insert([
            'category_id' => 1,
            'title' => "Money Bag",
            'description' => "Chicken, crab meat, peas and coconut wrapped in pastry served with sweet chilli sauce.",
            'price' => 8.5
        ]);

        DB::table('items')->insert([
            'category_id' => 2,
            'title' => "Bangkok Omelette (GF)",
            'description' => "Thai omelette with diced bacon, mix vegetable and shallot.",
            'price' => 15.5,
        ]);
        DB::table('items')->insert([
            'category_id' => 2,
            'title' => "Pra Ram Long Song (GF)",
            'description' => "Steamed mixed vegetable, tofu and peanut sauce.",
            'price' => 16.5,
            'vegetarian' => true
        ]);
        DB::table('items')->insert([
            'category_id' => 2,
            'title' => "Asian Green",
            'description' => "Stir fried mix green vegetable with oyster sauce.",
            'price' => 16.5,
            'vegetarian' => true
        ]);
    }
}
