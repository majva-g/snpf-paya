<?php

namespace Database\Factories;

use Domain\Sheba\Models\Sheba;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Sheba\Models\Sheba>
 */
class ShebaFactory extends Factory
{
    protected $model = Sheba::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'number' => fake()->unique()->numerify('IR########################'),
            'balance' => fake()->randomNumber(6),
        ];
    }
}
