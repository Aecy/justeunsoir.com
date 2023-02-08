<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountMediaController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();

        if ($request->hasFile('media')) {
            $user->addMedia($request->file('media'))->toMediaCollection();

            toast("Vous avez ajouté une nouvelle photo à votre profil, tout le monde pourra la visionner.", "success");

            return redirect()->to(
                route('account.medias')
            );
        }
    }
}
