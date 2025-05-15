<?php

namespace Database\Seeders;

use App\Models\Account;
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
        // user that I use for testing.
        $test_user = $home->users()->create([
            'name' => 'Tyler',
            'email' => 'tylerkingsley@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        $account1 = Account::factory()->create(['name' => $test_user->name . "'s account"]);
        $account2 = Account::factory()->create(['name' => $user1->name . "'s account"]);
        $account3 = Account::factory()->create(['name' => $user2->name . "'s account"]);
        $account4 = Account::factory()->create(['name' => 'joint account']);

        Transaction::factory(200)->create(
            fn() => [
                'user_id' => $user1->id,
                'account_id' => collect([$account1, $account2, $account3, $account4])->random()->id,
            ]
        );
        Transaction::factory(200)->create(
            fn() => [
                'user_id' => $user2->id,
                'account_id' => collect([$account1, $account2, $account3, $account4])->random()->id,
            ]
        );
        Transaction::factory(200)->create(
            fn() => [
                'user_id' => $test_user->id,
                'account_id' => collect([$account1, $account2, $account3, $account4])->random()->id,
            ]
        );

        /**
         * Creating an additonal user.
         * Just to ensure that there only the test user and home are given.
         */
        $externalUser = User::factory()->create();
        Transaction::factory(125)->create(['user_id' => $externalUser->id]);
    }
}
