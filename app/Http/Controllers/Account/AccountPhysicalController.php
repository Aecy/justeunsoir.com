<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountPhysicalUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AccountPhysicalController extends Controller
{
    public function update(AccountPhysicalUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        toast("Vous avez mis à jour vos informations physiques, votre profil est à {$request->user()->completionPercentage()}% terminé.", "success");

        return redirect()->to(
            route('dashboard')
        );
    }
}
