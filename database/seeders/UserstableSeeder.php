<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'borrower_id' => '111',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(111),
                'usertype' => 'admin',
            ],

            [
                'borrower_id' => '222',
                'username' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make(111),
                'usertype' => 'user',
            ],
        ]);
    }
}