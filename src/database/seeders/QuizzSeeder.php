<?php

namespace Database\Seeders;

use App\Models\Quizz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quizz::factory()->count(10)->create();
    }
}
