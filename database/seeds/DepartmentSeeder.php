<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([

                [
                    'dept_name' => 'Designing',
                ],[
                    'dept_name' => 'Software Development',
                ],[
                    'dept_name' => 'Software Testing',
                ]

            ]);
    }
}
