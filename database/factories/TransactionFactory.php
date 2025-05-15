<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => rand(1, 11),
            'account_id' => Account::factory(),
            'name' => fake()->company(),
            'amount' => rand(100, 30000),
            'date' => fake()->dateTimeBetween('-6 months', '-1 days')->format('Y-m-d'),
        ];
    }
}
