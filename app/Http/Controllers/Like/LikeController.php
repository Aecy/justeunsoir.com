<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    public function index(User $user): RedirectResponse
    {
        $this->getUser()->toggleLike($user);
        return Redirect::back();
    }
}
