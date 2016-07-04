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
        DB::table('users')->insert([
        	[
            	'username' => 'admin',
            	'email' => 'admin'.'@gmail.com',
            	'password' => bcrypt('altplus'),
            	'level' => 1,
            	'money' => 5000,
            	'created_at' => new DateTime(),
        	],
        	[
            	'username' => 'user1',
            	'email' => 'user1'.'@gmail.com',
            	'password' => bcrypt('12345678'),
            	'level' => 0,
            	'money' => 5000,
            	'created_at' => new DateTime(),
        	],
        	[
            	'username' => 'user2',
            	'email' => 'user2'.'@gmail.com',
            	'password' => bcrypt('12345678'),
            	'level' => 0,
            	'money' => 5000,
            	'created_at' => new DateTime(),
        	]
        ]);

    }
}
