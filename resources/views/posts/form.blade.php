        <div>
            <label  for="title">Your Title :</label>
            <input name="title" id="title" type="text" value="{{ old('title', $post->title ?? null) }}">
        </div>
        <div>
            <label for="content">Your Content :</label>
            <input name="content" id="content" type="text" value="{{ old('content', $post->content ?? null) }}">
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li> 
                @endforeach      
            </ul> 
        @endif