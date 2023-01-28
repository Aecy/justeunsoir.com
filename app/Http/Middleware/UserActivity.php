<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserActivity
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
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put("users_online-" . Auth::user()->id, true, $expiresAt);

            User::whereId(Auth::user()->id)->update([
                'last_seen' => now()
            ]);
        }

        return $next($request);
    }
}
