<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\User\UserRolesEnum;
use Illuminate\Support\Facades\Auth;

class UserIsAdmin
{
    /**
     * Regarde si l'utilisateur est admin pour lui donner accès à l'admin panel.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === UserRolesEnum::ADMIN) {
            return $next($request);
        }

        return redirect()->to(
            url('/')
        );
    }
}
