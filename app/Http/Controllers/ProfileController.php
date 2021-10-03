<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "My profile";
        $paragraph = "This is my profile";
        $musicAlbums = [
            [
                'artist' => '1',
                'title' => 'Album 1'
            ],
            [
                'artist' => '2',
                'title' => 'Album 2'
            ]
        ];

        return view('about', compact('title', 'paragraph'));
    }
}
