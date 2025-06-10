<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WeightLogController;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Fortifyのログインビュー（必要な場合）
Fortify::loginView(fn () => view('auth.login'));

// 会員登録ステップ1
Route::get('/register/step1', [RegisterController::class, 'create'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'store'])->name('register.store');

// 初期体重登録（ステップ2）
Route::get('/register/step2', [RegisterController::class, 'createStep2'])->name('register.step2');
Route::post('/register/step2', [RegisterController::class, 'storeStep2'])->name('register.step2.store');

// ログアウト（POSTリクエスト）
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/', fn () => redirect()->route('login'));


// 🔐 認証後アクセスグループ
Route::middleware(['auth'])->group(function () {
    // トップページ（管理画面）
    Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('weight_logs.index');

    // 体重登録
    Route::get('/weight_logs/create', [WeightLogController::class, 'create'])->name('weight_logs.create');
    Route::post('/weight_logs', [WeightLogController::class, 'store'])->name('weight_logs.store');

    // 体重検索
    Route::get('/weight_logs/search', [WeightLogController::class, 'search'])->name('weight_logs.search');

    // 体重詳細（※ルートは必要に応じて追加）
    Route::get('/weight_logs/{id}', [WeightLogController::class, 'show'])->name('weight_logs.show');

    // 体重更新（表示→更新）
    Route::get('/weight_logs/{id}/update', [WeightLogController::class, 'edit'])->name('weight_logs.edit');
    Route::put('/weight_logs/{id}', [WeightLogController::class, 'update'])->name('weight_logs.update');

    // 体重削除
    Route::delete('/weight_logs/{id}/delete', [WeightLogController::class, 'destroy'])->name('weight_logs.destroy');

    // 目標設定
    Route::get('/weight_logs/goal_setting', [WeightLogController::class, 'editGoal'])->name('weight_logs.goal_setting');
    Route::put('/weight_logs/goal_setting', [WeightLogController::class, 'updateGoal'])->name('weight_logs.goal_setting.update');
});
