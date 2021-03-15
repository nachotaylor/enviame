<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['continent_id' => 1, 'name' => 'Chile'],
            ['continent_id' => 1, 'name' => 'Argentina'],
            ['continent_id' => 1, 'name' => 'Canadá'],
            ['continent_id' => 1, 'name' => 'Colombia'],
            ['continent_id' => 2, 'name' => 'Alemania'],
            ['continent_id' => 2, 'name' => 'Francia'],
            ['continent_id' => 2, 'name' => 'España'],
            ['continent_id' => 2, 'name' => 'Grecia'],
            ['continent_id' => 3, 'name' => 'India'],
            ['continent_id' => 3, 'name' => 'Japón'],
            ['continent_id' => 3, 'name' => 'Corea del Sur'],
            ['continent_id' => 4, 'name' => 'Australia'],
        ]);
    }
}
