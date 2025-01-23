<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    $specializations = [
        ['name' => 'Cardiology', 'description' => 'Heart specialist'],
        ['name' => 'Dermatology', 'description' => 'Skin specialist'],
        ['name' => 'Neurology', 'description' => 'Nervous system specialist'],
    ];

    foreach ($specializations as $specialization) {
        DB::table('specializations')->updateOrInsert(
            ['name' => $specialization['name']],
            ['description' => $specialization['description']]
        );
    }
}
}
