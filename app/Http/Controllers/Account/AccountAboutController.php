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

        alert()->success("Votre compte est à jour !", "Merci d'avoir mis à jour vos informations.");

        return redirect()->to(
            route('dashboard')
        );
    }
}
