<?php

namespace Database\Factories;

use App\Models\Quizz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quizz>
 */
class QuizzFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
    */
    protected $model = Quizz::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'logo_url' => $this->faker->imageUrl(),
        ];
    }
}
