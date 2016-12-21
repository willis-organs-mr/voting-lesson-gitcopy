<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function store (CommunityLink $link)
    {
        auth()->user()->votes()->toggle($link);

        return back();
    }
}
