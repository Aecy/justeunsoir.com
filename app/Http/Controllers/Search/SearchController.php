<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Chercher un utilisateur selon vos préférences et met en place la pagination.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $users = User::orderByDesc('created_at')
            ->isCompleted()
            ->filter($request->except('_token'))
            ->paginate(20);

        $users->appends($request->only('looking', 'start_age', 'end_age', 'state', 'country'));

        return view('search.index', [
            'users' => $users
        ]);
    }
}
