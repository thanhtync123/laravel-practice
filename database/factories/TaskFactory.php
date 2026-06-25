<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title' => fake()->sentence(3),
        'description' => fake()->paragraph(1),
        'long_description' => fake()->paragraph(3),
        'completed' => fake()->boolean(40), 
        ];
    }
}
