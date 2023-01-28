<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Affiche la page du compte de l'utilisateur connecté.
     *
     * @return View
     */
    public function index(): View
    {
        return view('account.index', [
            'user' => $this->getUser()
        ]);
    }
}
