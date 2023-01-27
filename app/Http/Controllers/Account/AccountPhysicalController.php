<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountAboutUpdateRequest;
use App\Http\Requests\Account\AccountLookingUpdateRequest;
use App\Http\Requests\Account\AccountPhysicalUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AccountPhysicalController extends Controller
{
    public function update(AccountPhysicalUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return Redirect::route('dashboard')->with('status', 'physical-updated');
    }
}
