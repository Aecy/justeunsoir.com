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

        alert()->success("Compte mis à jour !", "Vous avez mis à jour votre à propos.");

        return redirect()->to(
            route('dashboard')
        );
    }
}
