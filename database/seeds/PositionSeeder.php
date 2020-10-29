<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
               [
                    'dept_id' => '1',
                    'position_name' => 'Associate Creative',
                ],[
                    'dept_id' => '1',
                    'position_name' => 'Creative',
                ],[
                    'dept_id' => '1',
                    'position_name' => 'Senior Creative',
                ],[
                    'dept_id' => '1',
                    'position_name' => 'Front End Developer',
                ],[
                    'dept_id' => '1',
                    'position_name' => 'Senior Front End Developer',
                ],[
                    'dept_id' => '1',
                    'position_name' => 'Associate Team Lead',
                ],[
                    'dept_id' => '1',
                    'position_name' => 'Team Lead',
                ],[
                    'dept_id' => '1',
                    'position_name' => 'Department Head',
                ],



                [
                    'dept_id' => '2',
                    'position_name' => 'Trainee Engineer',
                ],[
                    'dept_id' => '2',
                    'position_name' => 'Associate Software Engineer',
                ],[
                    'dept_id' => '2',
                    'position_name' => 'Software Engineer',
                ],[
                    'dept_id' => '2',
                    'position_name' => 'Senior Software Engineer',
                ],[
                    'dept_id' => '2',
                    'position_name' => 'Associate Team Lead',
                ],[
                    'dept_id' => '2',
                    'position_name' => 'Team Lead',
                ],[

                    'dept_id' => '2',
                    'position_name' => 'Team Lead',
                ],[

                    'dept_id' => '2',
                    'position_name' => 'Project Manager',
                ],                [
                    'dept_id' => '3',
                    'position_name' => 'Trainee Test Engineer (Security)',
                ],[
                    'dept_id' => '3',
                    'position_name' => 'Trainee Test Engineer (Manual)',
                ],[
                    'dept_id' => '3',
                    'position_name' => 'Trainee Test Engineer (Automation)',
                ],[
                    'dept_id' => '3',
                    'position_name' => 'Associate Test Engineer (Security)',
                ]


            ]);
    }
}
