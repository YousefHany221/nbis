<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// المسار العام بعد تسجيل الدخول
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'nurse') {
        return view('nurse.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// المسارات المشتركة (تعديل الحساب)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- 🏥 منطقة الممرضة (Nurse Section) ---
// مسموح فقط للمستخدم اللي الـ role بتاعه nurse
Route::middleware(['auth', 'role:nurse'])->group(function () {
    Route::get('/nurse/dashboard', function () {
        return "Welcome Nurse! This is the Newborn Registration Page.";
    })->name('nurse.dashboard');

    // هنا هنزود مستقبلاً رابط الـ Store لتسجيل الطفل
    Route::post('/babies/store', [BabyController::class, 'store'])->name('babies.store');
});

// --- 👮 منطقة الشرطة (Police Section) ---
// مسموح فقط للمستخدم اللي الـ role بتاعه police
Route::middleware(['auth', 'role:police'])->group(function () {
    Route::get('/police/dashboard', function () {
        return "Welcome Officer! This is the Footprint Search Page.";
    })->name('police.dashboard');

    // هنا هنزود مستقبلاً رابط الـ Search
});


require __DIR__ . '/auth.php';