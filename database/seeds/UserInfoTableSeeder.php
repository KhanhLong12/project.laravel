<?php

use Illuminate\Database\Seeder;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {			
    	\Illuminate\Support\Facades\DB::table('user_info')->insert([
    	'fullname' => 'long',
    	'address' => 'Bac Ninh',
    	'user_id' => 200,
    	'fullname' => 'Nguyen Khanh Long',
    	'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ]);

         // $faker = \Faker\Factory::create();
         // for ($i=0; $i < 100; $i++) { 
         // 	\Illuminate\Support\Facades\DB::table('userinfo')->insert([
         // 		'address' => $faker->text(20),
         // 	]);
    }
}
