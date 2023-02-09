<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Services\Image\ImageAvatarService;
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
