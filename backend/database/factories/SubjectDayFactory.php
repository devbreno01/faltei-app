<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectDay>
 */
class SubjectDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'day' => $this->faker->randomElement([
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday',
            ]),
            'subject_id' => Subject::factory(),
        ];
    }
}
