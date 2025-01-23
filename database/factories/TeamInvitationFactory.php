<?php

namespace Database\Factories;

use App\Models\TeamInvitation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamInvitationFactory extends Factory
{
    protected $model = TeamInvitation::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement(['admin', 'editor', 'viewer']),
        ];
    }
}
