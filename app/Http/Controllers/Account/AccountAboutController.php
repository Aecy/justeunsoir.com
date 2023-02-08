<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountAboutUpdateRequest;
use Illuminate\Http\RedirectResponse;

class AccountAboutController extends Controller
{
    /**
     * Met à jour le "à propos" d'un utilisateur.
     *
     * @param AccountAboutUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(AccountAboutUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        toast("Vous avez mis à jour les informations à propos, votre profil est à {$request->user()->completionPercentage()}% terminé.", "success");

        return redirect()->to(
            route('dashboard')
        );
    }
}
