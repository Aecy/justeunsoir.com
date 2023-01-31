<?php

namespace App\Http\Controllers\Favorite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function index(User $user): RedirectResponse
    {
        $this->getUser()->toggleFavorite($user);
        return Redirect::back();
    }

    public function show(User $user): View
    {
        return view('users.friends', [
            'user' => $user
        ]);
    }
}
