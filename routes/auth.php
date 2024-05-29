<?php

use App\Http\Controllers\Auth\OAuthCallbackController;
use App\Http\Controllers\Auth\OAuthRedirectController;
use Illuminate\Support\Facades\Route;

Route::inertia('login', 'Auth/Login')->name('login');

Route::get('{provider}/redirect', OAuthRedirectController::class)->name('provider.redirect');
Route::get('{provider}/callback', OAuthCallbackController::class)->name('provider.callback');

Route::middleware('auth')->group(function () {
    Route::post('logout', function () {
        auth()->logout();

        return to_route('auth.login');
    })->name('logout');
});
