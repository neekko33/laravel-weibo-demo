<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date_time = fake()->date . ' ' . fake()->time;
        return [
            'user_id' => fake()->randomElement(['1', '2', '3']),
            'content' => fake()->text(),
            'created_at' => $date_time,
            'updated_at' => $date_time,
        ];
    }
}
