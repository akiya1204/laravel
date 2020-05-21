<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run() { DB::table('users')->insert([
        [
            'name'           => '田中太郎',
            'email'          => 'tanaka@example.com',
            'password'       => Hash::make('password'),
        ],
    ]);
}
}
