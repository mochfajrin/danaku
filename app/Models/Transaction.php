<?php

namespace App\Models;

use App\Enums\TransactionType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'types',
        'amount',
        'date',
        'user_id'
    ];
    protected $casts = [
        'date' => 'datetime'
    ];
    public function scopeThisMonthIncome($query)
    {
        return $query->where('types', TransactionType::Income)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year);
    }
    public function scopeThisMonthExpense($query)
    {
        return $query->where('types', TransactionType::Expense)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getFormattedAmount()
    {
        return 'Rp ' . number_format($this->amount, 2, ',', '.');
    }
    public function getDate()
    {
        return Carbon::parse($this->date)->format('Y-m-d');
    }
}
