<?php

use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Mei Gwilym',
        'email' => 'mei.gwilym@gmail.com',
        'password' => bcrypt('DrAUAwZjuncvsRF8WhBL'),
        'remember_token' => str_random(10),
      ]);
    }
}
