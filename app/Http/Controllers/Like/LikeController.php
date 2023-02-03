<?php

namespace App\Http\Controllers\Like;

use App\Actions\Like\LikeAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class LikeController extends Controller
{
    /**
     * Instancie la propriété toggle de la classe LikeAction.
     *
     * @param LikeAction $action
     */
    public function __construct(
        private LikeAction $action,
    ) { }

    /**
     * Toggle l'ajout d'un cœur ou son retrait pour un utilisateur.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function index(User $user): RedirectResponse
    {
        $this->action->toggle($this->getUser(), $user);
        return redirect()->back();
    }
}
