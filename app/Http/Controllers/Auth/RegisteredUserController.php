<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Students;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }
    public function studentCreate()
    {
        return view('auth.student-register');
        // if(count(User::all()) >= 1)
        //     return redirect()->route('login');
        // else
    }
    public function facultyCreate()
    {
        return view('auth.faculty-register');
        // if(count(User::all()) >= 1)
        //     return redirect()->route('login');
        // else
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0,
        ]);

        return redirect()->route('login')->with('success', 'Admin registered successfully');
    }

    public function storeFaculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => 'required|confirmed',
            'regno' => 'required|numeric|unique:users',
        ]);

        $user = User::create([
            'regno' => $request->regno,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
        ]);

        return redirect()->route('login')->with('success', 'Faculty Registered Successfully');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => 'required|confirmed',
            'regno' => 'required|numeric|unique:students',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        // Create student record associated with the user
        Students::create([
            'user_id' => $user->id, // Assign the newly created user's ID
            'regno' => $request->regno,
        ]);

        return redirect()->route('login')->with('success', 'Student Registered Successfully');
    }
}
