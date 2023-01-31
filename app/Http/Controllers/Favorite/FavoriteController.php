<?php

namespace App\Http\Controllers\Favorite;

use App\Actions\Favorite\FavoriteAction;
use App\Actions\Like\LikeAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function __construct(
        private FavoriteAction $action
    ) { }

    public function index(User $user): RedirectResponse
    {
        $this->action->toggle(
            $this->getUser(),
            $user
        );

        return Redirect::back();
    }

    public function show(User $user): View
    {
        return view('users.friends', [
            'user' => $user
        ]);
    }
}
