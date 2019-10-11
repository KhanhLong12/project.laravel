<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
        	'name' => 'Admin',
        	'email' => 'Admin@gmail.com',
        	'password' => bcrypt('123456'),
        	'created_at' => \Carbon\Carbon::now(),
        	'updated_at' => \Carbon\Carbon::now()
        ]);

        $faker = \Faker\Factory::create();
        for ($i=0; $i < 200; $i++) { 
        	\DB::table('users')->insert([
        		'name' => $faker->text(20),
	        	'email' => $faker->unique()->safeEmail,
	        	'password' => bcrypt('123456'),
	        	'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        	]);
        }
    }
}
