<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                [
                    'name' => 'Superadmin',
                    'email' => 'superadmin',
                    'password' => Hash::make('superadmin123'),
                    'role' => 3
                ]
            ]);
    }
}
