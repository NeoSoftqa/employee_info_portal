<?php

use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technologies')->insert([
                [
                    'dept_id' => '1',
                    'tech_name' => 'UX / UI Developer',
                ],[
                    'dept_id' => '1',
                    'tech_name' => 'UX / UI Designer',
                ],[
                    'dept_id' => '2',
                    'tech_name' => 'PHP',
                ],[
                    'dept_id' => '2',
                    'tech_name' => 'Python',
                ],[
                    'dept_id' => '2',
                    'tech_name' => 'ROR',
                ],[
                    'dept_id' => '2',
                    'tech_name' => 'Android',
                ],[
                    'dept_id' => '3',
                    'tech_name' => 'QC / Test Engineer (Automation)',
                ],[
                    'dept_id' => '3',
                    'tech_name' => 'QC / Test Engineer (Performance)',
                ],[
                    'dept_id' => '3',
                    'tech_name' => 'QC / Test Engineer (Manual)',
                ],[
                    'dept_id' => '3',
                    'tech_name' => 'QC / Test Engineer (Security)',
                ]



            ]);
    }
}
