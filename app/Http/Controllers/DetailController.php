<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($id)
    {
        $character = DB::table('characters')->where('id', $id)->first();

        $user_id = Auth::id();
        $user = User::find($user_id);

        if ($character->active == 0) {
            if ($user->role == 'admin') {
                $title = "Hello";

                return view('characters.detail', compact('title', 'character'));
            } else {
                abort(401);
            }
        } else {
            $title = "Hello";

            return view('characters.detail', compact('title', 'character'));
        }
    }
}
