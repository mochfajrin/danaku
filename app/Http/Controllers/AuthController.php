<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginAction(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'string|min:8|max:100|required'
        ]);
        $user = User::where('email', $data['email'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::attempt($data);
        } else {
            return redirect('login')->with('error', 'Username or Password not found');
        }
        return redirect('dashboard');
    }
    public function register()
    {
        return view('register');
    }
    public function registerAction(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required|unique:users',
            'name' => 'string|min:5|max:100|required',
            'password' => 'string|min:8|max:100|required',
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Wallet::create(['user_id' => $user->id, 'balance' => 0]);
        return redirect('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
