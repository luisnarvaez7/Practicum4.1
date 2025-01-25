<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Availability;

class AvailabilitySeeder extends Seeder
{
    public function run()
    {
        Availability::factory()->count(10)->create();
    }
}
