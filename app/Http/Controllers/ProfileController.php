<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "My profile";
        $id = Auth::id();

        //$favouriteCharacters = CharacterUser::where('user_id','=', $id);
        $favouriteCharacters = Auth::user()->characters;

        $myCharacters = Character::all()
            ->where('user_id','=', $id)
            ->where('active', '=', 1);

        return view('profile', compact('title', 'favouriteCharacters', 'myCharacters', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();
        $user = DB::table('users')->where('id', $user_id)->first();

        if ($user->role == 'admin' || $id == $user->id) {
            $title = 'Edit profile';

            return view('editProfile', compact('title', 'user'));
        } else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $character = Character::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'tag' => 'required'
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,jpg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('character', 'public');

            $character -> name = $request->input('name');
            $character -> description = $request->input('description');
            $character -> user_id = $id;
            $character -> tag = $request->input('tag');
            $character -> image = $request->file->hashName();

            $character->update(); // Finally, save the record.
        }

        return redirect()->back();
    }
}
