<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountAboutUpdateRequest;
use App\Http\Requests\Account\AccountLookingUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AccountLookingController extends Controller
{
    public function update(AccountLookingUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return Redirect::route('dashboard')->with('status', 'looking-updated');
    }
}
