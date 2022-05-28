<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include 'paisesArray.php';

        $data = [];
        foreach ($countries as  $value) {
          foreach ($value as $key => $country) {
    
            $data[$key] = $country;
          }
          Country::create($data);
        }
    }
}
