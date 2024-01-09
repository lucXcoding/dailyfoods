<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant; // Import the 'Restaurant' class from the appropriate namespace
use Illuminate\Support\Facades\DB; // Import the 'DB' class from the appropriate namespace
use  Faker\Factory;
class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for($i = 0; $i < 30; $i++){
            Restaurant::create([
                'name' => 'Restaurant ' . $i,
                'description' => 'Restaurant ' . $i . ' description',
                'address' => 'Restaurant ' . $i . ' address',
                'phone' => 'Restaurant ' . $i . ' phone',
                'type_cuisine' => 'Restaurant ' . $i . 'type_cuisine',
                'slug' => 'Restaurant ' . $i . ' website',
                'photo' => 'Restaurant ' . $i . ' image',
                'user_id' => 1,
            ]);
        }

    }
}
