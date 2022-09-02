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
            'start_date' => $this->faker->dateTimeBetween('-1 week', '+5 week'),
            'end_date' => $this->faker->dateTimeBetween('+6 week', '+10 week'),
            'staff_id' => mt_rand(1,10),
            'client_id' => mt_rand(1,5),
            'activity_id' => mt_rand(1,3)
        ];
    }
}
