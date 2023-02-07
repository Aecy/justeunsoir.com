<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Affiche la page de sécurité du compte.
     *
     * @return View
     */
    public function security(): View
    {
        return view('account.security', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * Affiche la page des amis du compte.
     *
     * @return View
     */
    public function favorites(): View
    {
        return view('account.favorites', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * Affiche la page des photos du compte.
     *
     * @return View
     */
    public function medias(): View
    {
        return view('account.medias', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * Supprime un compte utilisateur.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        alert()->success("Votre compte a été supprimé", "Vous avez supprimé votre compte ! En aucun cas nous pourrons vous retrouvez ces données.");

        return redirect()->to(
            url('/')
        );
    }
}
