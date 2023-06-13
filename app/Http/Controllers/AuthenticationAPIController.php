<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationAPIController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $req->email)->first();

        if (! $user || ! Hash::check($req->password, $user->password)) {
            throw ValidationException::withMessages([
                'credentials' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('user token')->plainTextToken;
    }

    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
    }

    public function profile(Request $req)
    {
        return response()->json(Auth::user());
    }
}
