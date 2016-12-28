<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['title', 'slug', 'colour'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function from(User $user)
    {
        $channel = new static;

        $channel->user_id = $user->id;

        if($user->isTrusted()) {
            $channel->approve();
        }

        return $channel;
    }

    public function contribute($attributes)
    {
        if ($existing = $this->channelAlreadyExists($attributes['slug']))
        {
            $existing->touch();

            throw new CommunityLinkAlreadySubmitted;    
        }
        return $this->fill($attributes)->save();
    }

    protected function channelAlreadyExists($channel)
    {
        return static::where('slug', $channel)->first();
    }

    /**
     * Mark the community link as approved
     * 
     * @return  $this 
     */
    public function approve()
    {
        $this->approved = true;

        return $this;
    }
}
