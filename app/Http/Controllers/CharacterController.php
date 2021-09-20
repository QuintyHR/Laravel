<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $title = "My Characters";

        $characters = Character::all();
        //SELECT * FROM characters
        //dd($characters);

        return view('characters.index', compact('title', 'characters'));
    }
}
