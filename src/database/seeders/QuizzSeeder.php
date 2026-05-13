<?php

namespace Database\Seeders;

use App\Models\Quizz;
use App\Models\Question;
use App\Models\Response;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class QuizzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Quizz::factory()->count(10)->create();

        Quizz::factory()
            ->count(10)
            ->has(
                Question::factory()
                    ->count(4)
                    ->state(new Sequence(
                        ['position' => 1],
                        ['position' => 2],
                        ['position' => 3],
                        ['position' => 4],
                    ))
                    ->has(
                        Response::factory()
                            ->count(4)
                            ->state(new Sequence(
                                ['is_correct' => true],
                                ['is_correct' => false],
                                ['is_correct' => false],
                                ['is_correct' => false],
                            ))

                    )
            )
            ->create();
    }
}
