<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => "admin",
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'remember_token' => md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)),
            'created_at' => '2017-10-26 15:00:43',
            'updated_at' =>'2017-10-26 15:00:43',
        ]);
    }
}

