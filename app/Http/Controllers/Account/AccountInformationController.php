<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AccountInformationController extends Controller
{
    /**
     * Met à jour les informations de l'utilisateur.
     *
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        toast("Vous avez mis à jour vos informations basique, votre profil est à {$request->user()->completionPercentage()}% terminé.", "success");

        return redirect()->to(
            route('dashboard')
        );
    }
}
