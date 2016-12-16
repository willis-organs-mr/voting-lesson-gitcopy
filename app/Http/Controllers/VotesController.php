<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function store (CommunityLink $link)
    {
        auth()->user()->votes()->toggle($link);

        return back();
    }
}
