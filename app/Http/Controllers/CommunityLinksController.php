<?php

namespace App\Http\Controllers;

use App\Channel;
use App\CommunityLink;
use Illuminate\Http\Request;
use App\Queries\CommunityLinksQuery;
use App\Http\Requests\CommunityLinkForm;
use App\Exceptions\CommunityLinkAlreadySubmitted;

class CommunityLinksController extends Controller
{
    
    
    /**
     * Show all community links.
     * 
     * @param  Channel $channel 
     * @return \Illuminate\View\View
     */
    public function index(Channel $channel = null)
    {
        // Display community links
        $links = (new CommunityLinksQuery)->get(
            request()->exists('popular'), $channel
        );

        $channels = Channel::orderBy('title', 'asc')->get();
        
        return view('community.index', compact('links', 'channels', 'channel'));
    }

    public function store(CommunityLinkForm $form)
    {
        try {
            $form->persist();
            
            if (auth()->user()->isTrusted()) {
                flash()->success('Thanks for the contribution');
            } else {
                flash()->overlay('This contribution will be approved shortly.', 'Thanks!');
            }
        } catch (CommunityLinkAlreadySubmitted $e) {
                flash()->overlay(
                    'We\'ll instead bump the timestamps and bring that link back to the top. Thanks!',
                    'That Link Has Already Been Submitted');
        }

        return back();
    }
}
