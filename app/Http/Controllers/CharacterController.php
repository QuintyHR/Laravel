<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $title = "League of Legends Character Collection";

        //SELECT * FROM characters
        //dd($characters);

        $search = $request->input('search');

        if (!$search) {
            $characters = Character::all();
        } else {
            $characters = Character::where('name','like','%'.$search.'%')->orderBy('id')->paginate(6);
        }

        return view('characters.index', compact('title', 'characters'));
    }
}
