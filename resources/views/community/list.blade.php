<ul class="list-group">
    @if(count($links))
    @foreach ($links as $link)
        <li class="CommunityLink list-group-item">
            <form method="POST" action="/votes/{{ $link->id }}">
                {{ csrf_field() }}
                <button class="btn {{ Auth::check() && Auth::user()->votedFor($link) ? 'btn-success' : 'btn-default' }}" {{ Auth::guest() ? 'disabled' : '' }} >
                    {{ $link->votes->count() }}
                </button>
            </form>
{{--             @if (Auth::check() && Auth::user()->votedFor($link))
                +1
            @endif --}}

            <a href="/community/{{ $link->channel->slug }}" class="label label-default" style="background: {{ $link->channel->colour }}">
                {{ $link->channel->title }}
            </a>
            <a href="{{ $link->link }}" target="_blank">
                {{ $link->title }}
            </a>

            <small>
                Contributed By {{ $link->creator->name }} {{ $link->updated_at->diffforhumans() }}
            </small>
        </li>
    @endforeach
    @else
        <li class="list-group-item">
            No contributions yet.
        </li>
    @endif
</ul>

{{ $links->appends(request()->query())->links() }}
