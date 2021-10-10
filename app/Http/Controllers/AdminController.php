<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $id = Auth::id();

        $user = DB::table('users')->where('id', $id)->first();

        if ($user->role != 'admin') {
            abort(401);
        } else {
            $title = "My admin page";

            $characters = Character::all();

            return view('admin', compact('title', 'characters'));
        }
    }

    public function changeActive(Request $request)
    {
        $character = Character::find($request->character_id);
        $character->active = $request->active;
        $character->save();

        return response()->json(['success'=>'Character status changed successfully.']);
    }
}
