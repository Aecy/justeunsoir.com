<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountCoverUpdateRequest;
use App\Services\Image\ImageCoverService;

class AccountCoverController extends Controller
{
    /**
     * Met à jour la photo de couverture de l'utilisateur.
     *
     * @param AccountCoverUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(AccountCoverUpdateRequest $request)
    {
        $user = $this->getUser();

        if ($request->hasFile('cover')) {
            if ($user->cover) {
                app(ImageCoverService::class)->unlink($user->cover);
            }

            $cover = app(ImageCoverService::class)->link($user, $request);
            $user->update(['cover' => $cover ?? $user->cover]);

            toast("Vous avez mis à jour votre photo de couverture.", "success");
            return redirect()->back();
        }
    }
}
