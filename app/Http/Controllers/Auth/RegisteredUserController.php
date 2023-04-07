<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Modules\User\app\Models\User;
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
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user.first_name' => ['required', 'string', 'max:32'],
            'user.last_name' => ['required', 'string', 'max:32'],
            'user.username' => ['required', 'string', 'max:16', 'unique:' . User::class . ',username'],
            'user.phone' => ['required', 'string', 'max:16', 'unique:' . User::class . ',phone'],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = $request->user;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
