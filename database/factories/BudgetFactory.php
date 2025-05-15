<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'home_id' => Home::factory(),
            'category_id' => Category::factory(),
            'name' => fake()->randomElement(['entertainment', 'groceries', 'rent', 'fun fund', 'clothes', 'utilities', 'home', 'eating out', 'donations', 'travel', 'savings', 'subscriptions']),
            'period' => fake()->randomElement(['daily', 'weekly', 'fortnightly', 'monthly', 'quarterly', 'bi-annually', 'annually']),
            'amount' => rand(100, 30000),
        ];
    }
}
