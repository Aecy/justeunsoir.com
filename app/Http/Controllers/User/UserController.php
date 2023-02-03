<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Afficher le profile d'un utilisateur.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }
}
