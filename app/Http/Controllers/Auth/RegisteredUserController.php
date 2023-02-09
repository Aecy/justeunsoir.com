<?php

namespace App\Http\Controllers\Auth;

use App\Actions\User\IncrementUserCreditAction;
use App\Actions\User\ReferralUserAction;
use App\Http\Controllers\Controller;
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
    public function create(): View
    {
        $referredUser = User::whereId(request()->referred_by)->whereNull('referred_by')->first();

        return view('auth.register', [
            'referredUser' => $referredUser
        ]);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country' => ['required', 'string', 'in:FR,BE'],
            'state' => ['required', 'string'],
            'referred_by' => ['nullable', 'integer', 'exists:users,id']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'state' => $request->state,
        ]);

        if ($request->referred_by) {
            $referredUser = User::whereId($request->referred_by)->whereNull('referred_by')->first();
            if ($referredUser) {
                $user->referred_by = $referredUser->id;
                $user->increment('credits', 5);
                $user->save();

                $referredUser->increment('credits', 10);
                $referredUser->save();
            }
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
