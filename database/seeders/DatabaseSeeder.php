<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Transaction::query()->delete();
        Wallet::query()->delete();
        User::query()->delete();

        $user = User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhondoe@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        Wallet::create(['user_id' => $user->id, 'balance' => 100000]);
        Transaction::factory()->count(100)->create();
    }
}
