<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountMediaController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();

        if ($request->hasFile('media')) {
            $user->addMedia($request->file('media'))->toMediaCollection();

            return Redirect::back();
        }
    }
}
