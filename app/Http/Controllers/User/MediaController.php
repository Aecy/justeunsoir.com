<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function show(User $user): View
    {
        return view('users.medias', [
            'user' => $user
        ]);
    }
}
