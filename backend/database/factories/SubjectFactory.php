<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Semester; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hoursPerClass = $this->faker->randomElement([1, 2, 3, 4]);
        $totalHours = $hoursPerClass * $this->faker->numberBetween(15, 30);

        return [
            'name' => $this->faker->words(3, true),
            'maximum_allowed_absence_percentage' => $this->faker->numberBetween(15, 30),
            'total_hours' => $totalHours,
            'hours_per_class' => $hoursPerClass,
            'color' => $this->faker->hexColor(),
            'semester_id' => Semester::factory(),
        ];
    }
}
