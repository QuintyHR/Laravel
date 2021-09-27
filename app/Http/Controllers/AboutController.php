<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = "About";
        $paragraph = "I started this website to create a place full of information about different characters of League of Legends";
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

        return view('about', compact('title', 'paragraph', 'musicAlbums'));
    }
}
