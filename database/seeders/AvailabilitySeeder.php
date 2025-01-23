<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Availability;

class AvailabilitySeeder extends Seeder
{
    public function run()
    {
        Availability::factory(10)->create();
    }
}
