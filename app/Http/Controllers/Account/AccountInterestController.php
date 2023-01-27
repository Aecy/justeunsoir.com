<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountAboutUpdateRequest;
use App\Http\Requests\Account\AccountInterestUpdateRequest;
use App\Http\Requests\Account\AccountLookingUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AccountInterestController extends Controller
{
    public function update(AccountInterestUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return Redirect::route('dashboard')->with('status', 'interest-updated');
    }
}
