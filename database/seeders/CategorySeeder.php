<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            'Income' => ['Income', 'Interest', 'Sale'],
            'Expense' => ['Entertainment', 'Groceries', 'Eating Out', 'General', 'Clothes', 'Other'],
            'Saving & Investment' => ['investment', 'saving'],
        ];

        foreach ($category as $type => $names) {
            foreach ($names as $name) {
                Category::firstOrCreate([
                    'name' => $name,
                    'type' => $type,
                ]);
            }
        }
    }
}
