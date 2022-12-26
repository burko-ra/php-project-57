<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(2),
            'status_id' => fake()->numberBetween(1, 4),
            'created_by_id' => fake()->numberBetween(1, 5),
            'assigned_to_id' => fake()->numberBetween(1, 5),
        ];
    }
}
