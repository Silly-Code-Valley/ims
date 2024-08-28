<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {

    // Return view based on user role
    
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

Route::middleware('checkrole:Student')->name('student.')->group(function () {
    // sample route
    Route::get('/studentonly', function () {
        return view('student.studentonly');
    })->name('studentonly');
});

Route::middleware('checkrole:Partner')->name('partner.')->group(function () {

});

Route::middleware('checkrole:Director')->name('director.')->group(function () {

});

Route::middleware('checkrole:Coordinator')->name('coordinator.')->group(function () {

});
