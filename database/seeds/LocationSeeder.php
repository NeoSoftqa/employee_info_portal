<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
       	DB::table('locations')->insert([

                [
                    'name' => 'Ahmedabad',
                ],[
                    'name' => 'Bengaluru',
                ],[
                    'name' => 'Bengaluru',
                ],[
                    'name' => 'Chennai',
                ],[
                    'name' => 'Delhi',
                ],[
                    'name' => 'Gurgaon',
                ],[
                    'name' => 'Hyderabad / Secunderabad',
                ],[
                    'name' => 'Kolkata',
                ],[
                    'name' => 'Mumbai',
                ],[
                    'name' => 'Mumbai City',
                ],[
                    'name' => 'Navi Mumbai',
                ],[
                    'name' => 'Thane',
                ],[
                    'name' => 'Noida',
                ],[
                    'name' => 'Pune',
                ],[
                    'name' => 'Agartala',
                ],[
                    'name' => 'Abohar',
                ],[
                    'name' => 'Agra',
                ],[
                    'name' => 'Ahmednagar',
                ],[
                    'name' => 'Aizawal',
                ]

            ]);

    }
}
