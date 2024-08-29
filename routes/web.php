<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeControlller;
use App\Http\Controllers\AdherantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\FormationEnseignantController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard',  [HomeControlller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/test', [HomeControlller::class, 'test'])->name('test');
    Route::resource('adherants', AdherantController::class);
    Route::resource('formations', FormationController::class);
    Route::resource('enseignants', EnseignantController::class);
    Route::get('adherents/{adherent}/assign', [AdherantController::class, 'assignForm'])->name('adherents.assignForm');
    Route::post('adherents/{adherent}/assign', [AdherantController::class, 'assign'])->name('adherents.assign');
    Route::resource('formation-enseignants', FormationEnseignantController::class);
});

require __DIR__.'/auth.php';
