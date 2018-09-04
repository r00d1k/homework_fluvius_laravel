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
        \App\User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('secret'),
            'api_token' => '$uperP4$$w0rd',
        ]);
    }
}
