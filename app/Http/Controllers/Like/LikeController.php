<?php

namespace App\Http\Controllers\Like;

use App\Actions\Like\LikeAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class LikeController extends Controller
{
    public function __construct(
        private LikeAction $action,
    ) { }

    public function index(User $user): RedirectResponse
    {
        $this->action->toggle($this->getUser(), $user);
        return redirect()->back();
    }
}
