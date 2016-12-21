<?php 

namespace App\Queries;

use App\CommunityLink;

class CommunityLinksQuery
{
    public function get($sortByPopular, $channel)
        {
            $orderBy = $sortByPopular ? 'votes_count' : 'updated_at';
            
            return CommunityLink::with('channel', 'creator')
                ->withCount('votes')
                ->orderBy($orderBy, 'DESC')
                ->forChannel($channel)
                ->where('approved', 1)
                ->latest('updated_at')
                ->paginate(3);
        }    
}
