        <div class="form-group">
            <label class="" for="title">Your Title :</label>
            <input class="form-control" name="title" id="title" type="text" value="{{ old('title', $post->title ?? null) }}">
        </div>
        <div class="form-group bottom">
            <label class="" for="content">Your Content :</label>
            <input class="form-control" name="content" id="content" type="text" value="{{ old('content', $post->content ?? null) }}">
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li> 
                @endforeach      
            </ul> 
        @endif