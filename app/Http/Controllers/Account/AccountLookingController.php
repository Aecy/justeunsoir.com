<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountLookingUpdateRequest;
use Illuminate\Http\RedirectResponse;

class AccountLookingController extends Controller
{
    public function update(AccountLookingUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return redirect()->to(
            route('dashboard')
        )->with('status', 'looking-updated');
    }
}
