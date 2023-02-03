<?php

namespace App\Http\Controllers\Favorite;

use App\Actions\Favorite\FavoriteAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    /**
     * Instancie la propriété toggle de la classe FavoriteAction.
     *
     * @param FavoriteAction $action
     */
    public function __construct(
        private FavoriteAction $action
    ) { }

    /**
     * Toggle l'ajout ou le retrait d'un favoris pour un utilisateur.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function index(User $user): RedirectResponse
    {
        $this->action->toggle($this->getUser(), $user);

        return Redirect::back();
    }

    /**
     * Affiche les favoris de l'utilisateur.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('users.favorites', [
            'user' => $user
        ]);
    }
}
