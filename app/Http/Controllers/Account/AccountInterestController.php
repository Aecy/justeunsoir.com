<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountInterestUpdateRequest;
use Illuminate\Http\RedirectResponse;

class AccountInterestController extends Controller
{
    public function update(AccountInterestUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return redirect()->to(
            route('dashboard')
        )->with('status', 'interest-updated');
    }
}
