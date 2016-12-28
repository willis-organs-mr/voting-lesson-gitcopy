@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>Channels</h3>           
            @include ('channels.list')
        </div>

        @include ('channels.add-channel')
    </div>
@stop
