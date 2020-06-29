@extends('layout')
@section('content')
    <h1>list of frameworks to learn</h1>
<form action="{{route('posts.store')}}" method="POST">
        @csrf
       
        @include('posts.form')

        <button class="btn btn-primary" type="submit">Add post</button>
    </form>
@endsection