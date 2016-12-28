@if (Auth::check())
<div class="col-md-4">
    <h3>Add a Channel</h3>
    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="/channels">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Title:</label>
                    <input type="text"
                        class="form-control" 
                        id="title" 
                        name="title" 
                        placeholder="What is the channel title?"
                        value="{{ old('title') }}"
                        required>

                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                    <label for="slug">Slug:</label>
                    <input type="text" 
                        class="form-control" 
                        id="slug" 
                        name="slug" 
                        placeholder="What is the channel slug?"
                        value="{{ old('slug') }}" 
                        required>

                    {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('colour') ? 'has-error' : '' }}">
                    <label for="colour">Colour:</label>
                    <input type="text" 
                        class="form-control" 
                        id="colour" 
                        name="colour" 
                        placeholder="What is the channel colour?"
                        value="{{ old('colour') }}" 
                        required>

                    {!! $errors->first('colour', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add Channel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@else
    <h3>Please sign in to add channel</h3>
@endif
