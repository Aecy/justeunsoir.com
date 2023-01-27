<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountAboutUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AccountAboutController extends Controller
{
    public function update(AccountAboutUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return Redirect::route('dashboard')->with('status', 'about-updated');
    }
}
