<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
                [
                    'role_name' => 'HOD',
                    'slug' => 'HOD',
                ],[
                    'role_name' => 'Team Lead',
                    'slug' => 'TeamLead',
                ]
            ]);
    }
}
