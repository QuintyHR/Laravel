<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "League of Legends Character Collection";
        $id = Auth::id();

        $userFavourites = CharacterUser::all()
            ->where('user_id', '=', $id);

        $favourite = "Add to favourites";
        $unFavourite = "Remove from favourites";

        $search = $request->input('search');
        $tag = $request->input('tag');

        if (!$search && !$tag) {

            $characters = Character::all()
                ->where('active', '=', 1);
            //If $search is not empty it will show all characters that match the input and orders them by ID
        }elseif($tag){
            $characters = Character::all()
                ->where('Tag', '=', $tag)
                ->where('active', '=', 1);
        } else {
            $characters = Character::where('name','like','%'.$search.'%')
                ->where('active', '=', 1)
                ->orderBy('id')
                ->paginate(20);
        }

        return view('characters.index', compact('title', 'favourite', 'unFavourite', 'characters', 'userFavourites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $user = User::find($id);

        if ($user->role == 'admin' || count($user->characters()->get()) >= 5) {
            $title = 'Create new character';

            return view('characters.create', compact('title'));
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Create new character';

        $id = Auth::id();
        $user = User::find($id);

        if ($user->role == 'admin' || $user->amount_favourites >= 5) {

            // Validate the inputs
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'tag' => 'required'
            ]);

            // ensure the request has a file before we attempt anything else.
            if ($request->hasFile('file')) {

                $request->validate([
                    'image' => 'mimes:jpeg,jpg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                ]);

                // Save the file locally in the storage/public/ folder under a new folder named /product
                $request->file->store('character', 'public');

                // Store the record, using the new file hashname which will be it's new filename identity.
                $character = new Character([
                    "name" => $request->get('name'),
                    "description" => $request->get('description'),
                    "user_id" => $id,
                    "tag" => $request->get('tag'),
                    "image" => $request->file->hashName()
                ]);
                $character->save(); // Finally, save the record.
            }

            return view('characters.create', compact('title'));
        } else {
            abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $character = Character::find($id);

        $user_id = Auth::id();

        $user = DB::table('users')->where('id', $user_id)->first();

        if ($user->role == 'admin' || $user_id == $character->user_id) {
            $title = 'Edit character';

            $character = Character::find($id);
            return view('characters.edit', compact('title', 'character'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $character = Character::find($id);

        $user_id = Auth::id();

        $user = DB::table('users')->where('id', $user_id)->first();

        if ($user->role == 'admin' || $user_id == $character->user_id) {
            $character->delete();

            return redirect()->back();
        } else {
            abort(401);
        }

//        if ($request->hasFile('file')) {
//            Storage::delete($myImage->file); // If $file is path to old image
//
//            $myImage->file= $request->file('file')->store('name-of-folder');
//        }
    }

    public function deleteImage(Request $request) {

        $character = Character::find($request->id);

        unlink("storage/".$character->image);

        Character::where("id", $character->id)->delete();

        return back()->with("success", "Character deleted successfully.");

    }

    public function favourite(Request $request)
    {
        $id = Auth::id();

        $favourite = new CharacterUser([
            "user_id" => $id,
            "character_id" => $request->get('character_id')
        ]);

        $favourite->save();


        $user = User::find($id);

        $user -> amount_favourites += 1;

        $user->update();

        return back();
    }

    public function unFavourite(Request $request)
    {
        $character_id = $request->get('character_id');

        $id = Auth::id();

        $character_user = DB::table('character_user')
            ->where('user_id', $id)
            ->where('character_id', $character_id);

        $character_user->delete();


        $user = User::find($id);

        $user -> amount_favourites -= 1;

        $user->update();

        return redirect()->back();
    }
}
