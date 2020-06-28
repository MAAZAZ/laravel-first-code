@extends('layout')
@section('content')
    <h1>list of frameworks to learn</h1>
<form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div>
            <label  for="title">Your Title :</label>
            <input name="title" id="title" type="text" value="{{ old('title') }}">
        </div>
        <div>
            <label for="content">Your Content :</label>
            <input name="content" id="content" type="text" value="{{ old('content') }}">
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li> 
                @endforeach      
            </ul> 
        @endif
        <button type="submit">Add post</button>
    </form>
@endsection