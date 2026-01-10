<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semester>
 */
class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = $this->faker->numberBetween(2020, 2030);
        $half = $this->faker->randomElement([1, 2]); // .1 or .2

         return [
            'starter_month' => $half === 1
                ? "{$year}-01-01"
                : "{$year}-07-01",

            'period' => (float) "{$year}.{$half}",

            'end_month' => $half === 1
                ? "{$year}-06-30"
                : "{$year}-12-31",

            'user_id' => User::factory(),
        ];
    }
}
