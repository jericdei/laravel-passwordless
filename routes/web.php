<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Index');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return inertia('Dashboard');
    })->name('dashboard');
});
