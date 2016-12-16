<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'trusted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isTrusted()
    {
        // cast to boolean use !!
        return !! $this->trusted;
    }

    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_links_votes')
            ->withTimestamps();
    }

    // Deprecated because of ->toggle($link) method
    
    // public function voteFor(CommunityLink $link)
    // {
    //     return $this->votes()->sync([$link->id], false);
    // }

    // public function unvoteFor(CommunityLink $link)
    // {
    //     return $this->votes()->detach($link);
    // }

    public function votedFor(CommunityLink $link)
    {
        return $link->votes->contains('user_id', $this->id);
    }
}
