<?php

namespace App\Models;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getFormatedAmount()
    {
        return 'Rp ' . number_format($this->amount, 2, ',', '.');
    }
}
