<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountAvatarController extends Controller
{
    /**
     * Met à jour l'avatar de l'utilisateur.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $fileName = $request->avatar->getClientOriginalName();

            $request->avatar->storeAs('avatars', $fileName, 'public');
            $request->user()->update(['avatar' => $fileName]);

            return redirect()->back();
        }
    }
}
