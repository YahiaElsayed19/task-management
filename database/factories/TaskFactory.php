<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraphs(2, true),
            'status' => fake()->randomElement(Task::$status),
            'priorty' => fake()->randomElement(Task::$priorty),
            'deadline' => fake()->dateTimeBetween('now', '+1 month')
        ];
    }
}
