<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();
        $user = $request->user();

        switch ($user->role) {
            case 0: // Admin
                return redirect()->route('dashboard'); // Replace 'admin.dashboard' with your admin dashboard route name
                break;
            case 1: // Faculty
                return redirect()->route('faculty.dashboard'); // Replace 'faculty.dashboard' with your faculty dashboard route name
                break;
            case 2: // Student
                return redirect()->route('student.dashboard'); // Replace 'student.dashboard' with your student dashboard route name
                break;
            default:
                return redirect(RouteServiceProvider::HOME);
        }
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
