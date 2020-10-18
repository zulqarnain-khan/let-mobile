<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city' => 'Lahore',
            'cityslug' => 'Lahore',
            'lat' => '300',
            'lng' => '345',
            'type'=> 'No',
            'prov_id'   => '1'
        ]);
    }
}
