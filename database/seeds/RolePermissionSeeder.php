<?php

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permissions')->insert([

                [
                    'role_id' => 3,
                    'perm_id' => 2,
                ],[
                    'role_id' => 3,
                    'perm_id' => 3,
                ],[
                    'role_id' => 3,
                    'perm_id' => 4,
                ],[
                    'role_id' => 3,
                    'perm_id' => 5,
                ],[
                    'role_id' => 3,
                    'perm_id' => 6,
                ],[
                    'role_id' => 3,
                    'perm_id' => 7,
                ],


                [
                    'role_id' => 2,
                    'perm_id' => 2,
                ],[
                    'role_id' => 2,
                    'perm_id' => 3,
                ],[
                    'role_id' => 2,
                    'perm_id' => 4,
                ],[
                    'role_id' => 2,
                    'perm_id' => 5,
                ],[
                    'role_id' => 2,
                    'perm_id' => 6,
                ],[
                    'role_id' => 2,
                    'perm_id' => 7,
                ],

                [
                    'role_id' => 1,
                    'perm_id' => 3,
                ],[
                    'role_id' => 1,
                    'perm_id' => 4,
                ],[
                    'role_id' => 1,
                    'perm_id' => 5,
                ],[
                    'role_id' => 1,
                    'perm_id' => 6,
                ],[
                    'role_id' => 1,
                    'perm_id' => 7,
                ],


                [
                    'role_id' => 4,
                    'perm_id' => 6,
                ],[
                    'role_id' => 4,
                    'perm_id' => 7,
                ]


            ]);
    }
}


