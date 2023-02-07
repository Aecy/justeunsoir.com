<?php

namespace App\Http\Middleware;

use App\Enums\User\UserRolesEnum;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserIsAdmin
{
    /**
     * Check the current user's activity.
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

        return null;
    }
}
