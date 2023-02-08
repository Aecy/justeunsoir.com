<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountInterestUpdateRequest;
use Illuminate\Http\RedirectResponse;

class AccountInterestController extends Controller
{
    public function update(AccountInterestUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        toast("Vous avez mis à jour vos informations de style de vie, votre profil est à {$request->user()->completionPercentage()}% terminé.", "success");

        return redirect()->to(
            route('dashboard')
        );
    }
}
