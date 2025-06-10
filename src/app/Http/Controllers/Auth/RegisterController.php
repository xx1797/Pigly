<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\InitialWeightRequest;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user);
        return redirect()->route('register.step2');
    }

    public function createStep2()
    {
        return view('auth.initial_weight');
    }

    public function storeStep2(InitialWeightRequest $request)
    {
        $user = auth()->user(); // ← null の可能性あり
        if (!$user) {
            return redirect()->route('register.step1')->withErrors(['error' => 'ログイン情報がありません。']);
        }

        WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->toDateString(),
            'weight' => $request->current_weight,
        ]);

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        return redirect()->route('weight_logs.index');
    }

}
