<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(6),
            'types' => $this->faker->randomElement(['income', 'expense']),
            'amount' => $this->faker->randomFloat(2, 10, 5000),
            'date' => Carbon::now()->startOfYear()->addMonths(rand(0, 11))->addDays(rand(0, 27))->format('Y-m-d'),
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
