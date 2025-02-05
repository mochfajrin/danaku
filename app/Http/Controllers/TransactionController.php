<?php

namespace App\Http\Controllers;

use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->latest()->take(10)->get();
        $thisMonthIncome = 'Rp ' . number_format(Transaction::where('user_id', Auth::user()->id)->thisMonthIncome()->sum('amount'), 2, ',', '.');
        $thisMonthExpense = 'Rp ' . number_format(Transaction::where('user_id', Auth::user()->id)->thisMonthExpense()->sum('amount'), 2, ',', '.');
        return view('dashboard.home', [
            'latestTransactions' => $transactions,
            'income' => $thisMonthIncome,
            'expense' => $thisMonthExpense
        ]);
    }
    public function transactions(Request $request)
    {
        $transactions = Transaction::query()->where('user_id', Auth::user()->id);
        if ($request->filled('types')) {
            $transactions->where('types', $request->input('types'));
        }
        if ($request->filled('date')) {
            $transactions->whereDate('date', Carbon::parse($request->input('date')));
        }
        if ($request->filled('sort_date')) {
            $transactions->orderBy('date', $request->input('sort_date'));
        } else {
            $transactions->latest('date');
        }
        $transactions = $transactions->paginate(10);
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
        $wallet = Wallet::where('user_id', $user->id)->first();
        if ($wallet->balance <= $data['amount'] && $data['types'] == TransactionType::Expense->value) {
            return redirect('dashboard/transactions')->with('error', "Insufficient Balance");
        }
        $transaction = Transaction::create($data);
        if ($transaction->types === TransactionType::Income->value) {
            $wallet->balance += $transaction->amount;
        } else {
            $wallet->balance -= $transaction->amount;
        }
        $wallet->save();
        return redirect('dashboard')->with('success', "Transaction Success");
    }
}
