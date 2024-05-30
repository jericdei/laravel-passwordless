<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmailLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['email', 'required', 'unique:users'],
            'name' => ['string', 'required'],
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'provider' => 'email',
            'name' => $request->input('name'),
        ]);

        //...
    }
}
