@extends('layouts.app')
@section('content')
            <h3>{{ $post->title }}</h3>
            <p>{{  $post->content }}</p>
            <em>{{ $post->created_at }}</em>
            @if ($post->active==true)
                <p>Enabled</p>
            @else
                <p>Disabled</p>
            @endif
@endsection