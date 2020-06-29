@extends('layout')
@section('content')
<form action="{{ route('posts.update', ['post'=> $post->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        @include('posts.form')

        <button type="submit">update post</button>
    </form>
@endsection