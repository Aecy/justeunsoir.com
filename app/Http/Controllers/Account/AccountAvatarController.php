<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountAvatarController extends Controller
{
    public function update(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $fileName = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('avatars', $fileName, 'public');

            $request->user()->update(['avatar' => $fileName]);

            return Redirect::back();
        }
    }
}
