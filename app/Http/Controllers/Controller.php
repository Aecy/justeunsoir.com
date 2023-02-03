<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Récupère l'utilisateur connecté ou null.
     *
     * @return User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getUser()
    {
        $user = Auth::user();

        if ($user instanceof User) {
            return $user;
        }

        return null;
    }
}
