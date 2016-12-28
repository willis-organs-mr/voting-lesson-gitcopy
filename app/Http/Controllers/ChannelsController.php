<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use App\Http\Requests\ChannelForm;
use App\Exceptions\ChannelAlreadyExists;

class ChannelsController extends Controller
{

    /**
     * Show all channels.
     *  
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Display channels.
        $channels = Channel::orderBy('title', 'asc')->get();
        
        return view('channels.index', compact('channels'));
    }

    public function store(ChannelForm $form)
    {
        try {
            $form->persist();
            
            if (auth()->user()->isTrusted()) {
                flash()->success('New Channel created.');
            } else {
                flash()->overlay('This Channel will be approved shortly.', 'Thanks!');
            }
        } catch (ChannelAlreadyExists $e) {
                flash()->overlay(
                    'Please suggest a title for a new Channel. Thanks!',
                    'That Channel already exists');
        }

        return back();
    }
}
