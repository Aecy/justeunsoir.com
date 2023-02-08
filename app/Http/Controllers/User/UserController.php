<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Affiche le profil d'un utilisateur.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function show(User $user): View|RedirectResponse
    {
        if (! $user->isCompleted()) {
            toast("Ce membre n'a pas terminé de compléter son profil.", "info");
            return redirect()->back();
        }

        return view('users.show', [
            'user' => $user
        ]);
    }
}
