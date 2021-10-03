<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($id)
    {
        $title = "Hello";

        $number = $id;

        $character = DB::table('characters')->where('id', $id)->first();

        return view('characters.detail', compact('title', 'number', 'character'));
    }
}
