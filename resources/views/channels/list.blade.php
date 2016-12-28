<ul class="list-group">
    @if(count($channels))
    @foreach ($channels as $channel)
        <li class="list-group-item">
            <a href="/community/{{ $channel->slug }}" class="label label-default" style="background: {{ $channel->colour }}">
                {{ $channel->title }}
            </a>
        </li>
    @endforeach
    @else
        <li class="list-group-item">
            No channels yet.
        </li>
    @endif
</ul>