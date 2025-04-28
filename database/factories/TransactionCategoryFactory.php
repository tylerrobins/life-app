<?php

namespace Database\Factories;

use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionCategory>
 */
class TransactionCategoryFactory extends Factory
{
    public $category = [
        'income' => ['Interest', 'Secondary Income', 'Sale'],
        'expense' => ['Entertainment', 'Groceries', 'Eating Out', 'General', 'Clothes', 'Other'],
        'saving & investment' => ['investment', 'saving'],
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['income', 'expense', 'saving & investment']);
        $name = fake()->randomElement($this->category[$type]);

        return [
            'name' => $name,
            'type' => $type,
            'home_id' => Home::factory(),
        ];
    }
}
