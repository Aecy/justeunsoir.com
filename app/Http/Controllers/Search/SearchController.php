<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $params = $request->except('_token');
        $users = User::orderByDesc('created_at')->filter($params)->paginate(20);

        $users->appends($request->only('looking', 'start_age', 'end_age', 'address'));

        return view('search.index', [
            'users' => $users
        ]);
    }
}
