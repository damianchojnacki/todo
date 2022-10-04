<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'priority' => $this->faker->randomElement(Priority::values()),
            'name' => $this->faker->sentence(),
            'description' => rand(0, 1) ? $this->faker->paragraph() : null,
            'deadline_at' => rand(0, 1) ? now()->addHours(rand(1, 168)) : null,
        ];
    }
}
