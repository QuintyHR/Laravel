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
        $user = User::find($id);

        //$favouriteCharacters = CharacterUser::where('user_id','=', $id);
        $favouriteCharacters = Auth::user()->favorites;

        $myCharacters = Auth::user()->characters()->whereActive( 1)->get();

        return view('profile', compact('title', 'favouriteCharacters', 'myCharacters', 'id', 'user'));
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
        $user = User::find($id);

        $request->validate([
            'name' => 'required'
        ]);

        $user -> name = $request->input('name');

        $user->update(); // Finally, save the record.


        return redirect()->back();
    }
}
