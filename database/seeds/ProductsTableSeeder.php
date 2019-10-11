<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 200; $i++) { 
        	$name = $faker->text(50);
        	\Illuminate\Support\Facades\DB::table('products')->insert([
        		'name' => $name,
        		'slug' => \Illuminate\Support\Str::slug($name),
        		'origin_price' => $faker->numberBetween(50000,80000),
        		'sale_price' => $faker->numberBetween(10000,40000),
        		'content' => $faker->text(500),
        		'status' => 1,
        		'user_id' => 1,
        		'category_id' => 1,
        		'created_at' => \Carbon\Carbon::now(),
        		'updated_at' => \Carbon\Carbon::now()
        	]);
        }
    }
}
