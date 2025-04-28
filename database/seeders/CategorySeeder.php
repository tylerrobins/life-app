<?php

namespace Database\Seeders;

use App\Models\TransactionCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            'income' => ['Income', 'Interest', 'Sale'],
            'expense' => ['Entertainment', 'Groceries', 'Eating Out', 'General', 'Clothes', 'Other'],
            'saving & investment' => ['investment', 'saving'],
        ];

        foreach ($category as $type => $names) {
            foreach ($names as $name) {
                TransactionCategory::firstOrCreate([
                    'name' => $name,
                    'type' => $type,
                ]);
            }
        }
    }
}
