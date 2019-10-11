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
        $categories=[
        	'Điện thoại',
        	'Tivi',
        	'Tủ Lạnh',
        	'Máy tính',
        	'Phụ kiện',
        ];
        foreach ($categories as $category) {
        	\Illuminate\Support\Facades\DB::table('categories')->insert([
        		'name' => $category,
        		'parent_id' =>0,
        		'depth' => 0,
        		'slug' => \Illuminate\Support\Str::slug($category),
        		'created_at' => \Carbon\Carbon::now(),
        		'updated_at' => \Carbon\Carbon::now()
        	]);
        }
    }
}
