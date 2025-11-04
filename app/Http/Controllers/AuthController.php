<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Normal login method
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Get the authenticated user ID
            $userId = Auth::id();

            // Redirect to resume edit page with user ID in URL
            return redirect()->route('resume.edit', ['id' => $userId]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Google redirect
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if user exists or create
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                ['name' => $googleUser->getName(), 'password' => bcrypt(uniqid())]
            );

            Auth::login($user, true);

            // Redirect to resume edit page with user ID in URL
            return redirect()->route('resume.edit', ['id' => $user->id]);
            
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->withErrors(['error' => 'Failed to login with Google. Please try again.']);
        }
    }
}