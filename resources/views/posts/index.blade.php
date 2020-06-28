@extends('layout')
@section('content')
    <h1>list of frameworks to learn</h1>
    <ul>
        @forelse($posts as $item)
         <li>
            <h3><a href="{{route('posts.show', ['post'=>$item->id]) }}">{{ $item->title }}</a></h3>
            <p>{{ $item->content }}</p>
            <em>{{ $item->created_at->diffForHumans() }}</em>
            @if ($item->active==true)
                <p>Enabled</p>
            @else
                <p>Disabled</p>
            @endif
        </li>
        @empty
            <p>Not post yet!</p>
        @endforelse
    </ul>
@endsection