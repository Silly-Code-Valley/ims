<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    
    if (Auth::user()->role === 'Student') {
        return view('student.dashboard');
    } elseif (Auth::user()->role === 'Partner') {
        return view('partner.dashboard');
    } elseif (Auth::user()->role === 'Director') {
        return view('director.dashboard');
    } elseif (Auth::user()->role === 'Coordinator') {
        return view('coordinator.dashboard');
    } else {
        return view('dashboard'); 
    }
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('student')->name('student.')->group(function () {
    // sample route
    Route::get('/student/dashboard', function () {
        return redirect()->route('dashboard');
    })->name('dashboard');
});

Route::middleware('partner')->name('partner.')->group(function () {

});

Route::middleware('director')->name('director.')->group(function () {

});

Route::middleware('coordinator')->name('coordinator.')->group(function () {

});
