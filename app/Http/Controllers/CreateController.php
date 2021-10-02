<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index()
    {
        $title = "Create page";

        return view('characters.create', compact('title'));
    }
}
