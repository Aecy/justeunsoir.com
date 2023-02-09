<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountAvatarUpdateRequest;
use App\Services\Image\ImageAvatarService;

class AccountAvatarController extends Controller
{
    /**
     * Met à jour l'avatar de l'utilisateur.
     *
     * @param AccountAvatarUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(AccountAvatarUpdateRequest $request)
    {
        $user = $this->getUser();

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                app(ImageAvatarService::class)->unlink($user->avatar);
            }

            $avatar = app(ImageAvatarService::class)->link($user, $request);
            $user->update(['avatar' => $avatar ?? $user->avatar]);

            toast("Vous avez mis à jour votre avatar, votre profil est à {$user->completionPercentage()}% terminé.", "success");
            return redirect()->back();
        }
    }
}
