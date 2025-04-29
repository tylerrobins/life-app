<?php

namespace Database\Seeders;

use App\Models\Home;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);

        $home = Home::factory()->create(['name' => 'Robins']);
        $user1 = User::factory()->create(['home_id' => $home->id]);
        $user2 = User::factory()->create(['home_id' => $home->id]);
        $test_user = $home->users()->create([
            'name' => 'Tyler',
            'email' => 'tylerkingsley@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        Transaction::factory(200)->create(['user_id' => $user1->id]);
        Transaction::factory(200)->create(['user_id' => $user2->id]);
        Transaction::factory(200)->create(['user_id' => $test_user->id]);

        /**
         * Creating an additonal user.
         * Just to ensure that there only the test user and home are given.
         */
        $externalUser = User::factory()->create();
        Transaction::factory(125)->create(['user_id' => $externalUser->id]);
    }
}
