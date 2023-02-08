<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserProfileIsCompleted
{
    /**
     * Regarde si l'utilisateur a terminé de compléter son profile.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && $request->user()->isCompleted()) {
            return $next($request);
        }

        toast("Vous devez compléter votre profil pour accéder au site.", 'error');

        return redirect()->to(
            route('dashboard')
        );
    }
}
