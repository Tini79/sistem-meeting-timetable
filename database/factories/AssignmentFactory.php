<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'startDate' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'endDate' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'note' => $this->faker->sentence(mt_rand(5,15)),
            'staff_id' => mt_rand(1,5),
            'client_id' => mt_rand(1,5),
            'activity_id' => mt_rand(1,3)
        ];
    }
}
