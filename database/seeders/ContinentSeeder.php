<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('continents')->insert([
            ['name' => 'América', 'anual_adjustment' => 4],
            ['name' => 'Europa', 'anual_adjustment' => 5],
            ['name' => 'Asia', 'anual_adjustment' => 6],
            ['name' => 'Oceanía', 'anual_adjustment' => 6],
            ['name' => 'Africa', 'anual_adjustment' => 5],
        ]);
    }
}
