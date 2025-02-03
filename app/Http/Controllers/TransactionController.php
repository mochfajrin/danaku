<?php

namespace App\Http\Controllers;

use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard.home', ['balance' => Wallet::where('user_id', Auth::user()->id)->first()->getFormatedBalance()]);
    }
    public function transactions(Request $request)
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->oldest()->get();
        return view('dashboard.transactions', ['transactions' => $transactions]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'amount' => 'numeric|required',
            'description' => 'string|required|min:1|max:255',
            'types' => [Rule::enum(TransactionType::class), 'required'],
            'date' => 'date|required'
        ]);
        $data['user_id'] = $user->id;
        if ($user->wallet()->balance <= $data['amount'] && $data['types'] == TransactionType::Expense) {
            return redirect('dashboard/transaction')->with('error', "Insufficient Balance");
        }
        $transaction = Transaction::create($data);
        if ($transaction->types === TransactionType::Expense) {
            $user->wallet()->balance += $transaction->amount;
        } else {
            $user->wallet()->balance -= $transaction->amount;
        }
        return redirect('dashboard/transactions')->with('success', "Transaction Success");
    }
}
