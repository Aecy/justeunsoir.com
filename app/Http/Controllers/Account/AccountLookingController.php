<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountLookingUpdateRequest;
use Illuminate\Http\RedirectResponse;

class AccountLookingController extends Controller
{
    public function update(AccountLookingUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        toast("Vous avez mis à jour vos informations de recherche, votre profil est à {$request->user()->completionPercentage()}% terminé.", "success");

        return redirect()->to(
            route('dashboard')
        );
    }
}
