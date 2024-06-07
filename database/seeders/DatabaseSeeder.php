<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = User::factory()->count(10)->create();
        $accounts = Account::factory()->count(100)->create();

        foreach ($users as $user) {
            $randomNumber = mt_rand(1, 7);
            $randomAccounts = $accounts->random($randomNumber);

            foreach ($randomAccounts as $randomAccount) {
                $user->accounts()->attach($randomAccount->id);
            }
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
