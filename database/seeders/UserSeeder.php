<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'role' => 'ADMIN',
            'password' => Hash::make('12345'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pumin',
            'email' => 'pumin@mail.com',
            'password' => Hash::make('12345'),
        ]);


    }
}
