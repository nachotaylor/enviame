<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            ['country_id' => 1, 'first_name' => 'Pedro', 'last_name' => 'Rojas', 'salary' => 2000],
            ['country_id' => 2, 'first_name' => 'Luciano', 'last_name' => 'Alessandri', 'salary' => 2100],
            ['country_id' => 3, 'first_name' => 'John', 'last_name' => 'Carter', 'salary' => 3050],
            ['country_id' => 4, 'first_name' => 'Alejandra', 'last_name' => 'Benavides', 'salary' => 2150],
            ['country_id' => 5, 'first_name' => 'Moritz', 'last_name' => 'Baring', 'salary' => 6000],
            ['country_id' => 6, 'first_name' => 'Thierry', 'last_name' => 'Henry', 'salary' => 5900],
            ['country_id' => 7, 'first_name' => 'Sergio', 'last_name' => 'Ramos', 'salary' => 6200],
            ['country_id' => 8, 'first_name' => 'Nikoleta', 'last_name' => 'Kyriakopulu', 'salary' => 7000],
            ['country_id' => 9, 'first_name' => 'Aamir', 'last_name' => 'Khan', 'salary' => 2000],
            ['country_id' => 10, 'first_name' => 'Takumi', 'last_name' => 'Fujiwara', 'salary' => 5000],
            ['country_id' => 11, 'first_name' => 'Heung-min', 'last_name' => 'Son', 'salary' => 5100],
            ['country_id' => 12, 'first_name' => 'Peter', 'last_name' => 'Johnson', 'salary' => 6100],
        ]);
    }
}
