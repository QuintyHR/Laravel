<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "My profile";
        $id = Auth::id();

        $favouriteCharacters = CharacterUser::where('user_id','=', $id);

        $myCharacters = Character::all()
            ->where('user_id','=', $id)
            ->where('active', '=', 1);

        return view('profile', compact('title', 'favouriteCharacters', 'myCharacters'));
    }
}
