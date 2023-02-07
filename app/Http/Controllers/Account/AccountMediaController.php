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

            alert()->success("Nouvelle photo", "Vous avez parfaitement ajouté une nouvelle photo.");

            return redirect()->to(
                route('account.medias')
            );
        }
    }
}
