<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse 
    {
        $credentials = $request->validated();
        
        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->withInput();
        }

        $request->session()->regenerate();

        $user = Auth::user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'dapur' => redirect()->route('dapur.dashboard'),
            'pemilik' => redirect()->route('pemilik.dashboard'),
            default => abort(403, 'Role tidak valid'),
        };
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
