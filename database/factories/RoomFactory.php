<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'room_number' => $this->faker->unique()->numberBetween(100, 999),
            'type' => $this->faker->randomElement(['consultation', 'surgery', 'recovery', 'intensive care', 'emergency', 'laboratory']), // Agregar el campo status
        ];
    }
}
