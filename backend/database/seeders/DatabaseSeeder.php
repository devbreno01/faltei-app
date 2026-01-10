<?php

namespace Database\Seeders;

use App\Models\Semester;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubjectDay;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(10)->create();
        Semester::factory()->count(5)->create();
        Subject::factory()
            ->count(5)
            ->has(
                SubjectDay::factory()->count(2)
            )
            ->create();

    }
}
