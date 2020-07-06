@extends('layouts.app')
@section('content')

<nav class="nav nav-tabs nav-stacked my-5">
    <a class="nav-link @if($type=='list') active @endif" href="/posts">list</a>
    <a class="nav-link @if($type=='archive') active @endif" href="/posts/archive">archive</a>
    <a class="nav-link @if($type=='all') active @endif" href="/posts/all">all</a>
</nav>

    <div class="my-3">
        @if($posts->count()==0 || $posts->count()==1)
            <h4>{{$posts->count()}} post</h4>
        @else 
            <h4>{{$posts->count()}} post(s)</h4>
        @endif
    </div>

    <h1>list of frameworks to learn</h1>
    <ul class="list-group">
        @forelse($posts as $item)
         <li class="list-group-item"> 
            <h3><a href="{{route('posts.show', ['post'=>$item->id]) }}">{{ $item->title }}</a></h3>
            <p>{{ $item->content }}</p>
            <em>{{ $item->created_at->diffForHumans() }}</em>
            @if ($item->active==true)
                <p>Enabled</p>
            @else
                <p>Disabled</p>
            @endif

            @if ($item->comment_count>1)
                <span class="badge badge-success">{{ $item->comment_count }} Comments</span>
            @elseif($item->comment_count==1)
                <span class="badge badge-success">{{ $item->comment_count }} Comment</span>
            @else
                <span class="badge badge-info">No Comments</span>
            @endif  
            <div class="row float-right">
            <div class="col-4">
            <form action="{{ route('posts.edit', [ 'post'=>$item->id])}}" method="GET">
                <button class="btn btn-warning" type="submit">Edit</button>
            </form>
            </div>
            <div class="container my-3">
            <div class="row">
                @if(!$item->deleted_at)
                    <div class="col-4">
                    <form action="{{ route('posts.destroy', [ 'id'=>$item->id])}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </div>
                @else 
                <div class="col-4">
                    <form method="POST" action="{{ url('/posts/'. $item->id .'/restore') }}">
                        @csrf
                        @method("PATCH")
                       <button class="btn btn-success" type="submit">Restore</button>
                    </form>
                    </div>
                    <div class="col-4">
                     <form method="POST" action="{{ url('/posts/'. $item->id .'/forcedelete') }}">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </div>
                @endif
            </div>
            </div>
        </li>
        @empty
            <span class="badge badge-danger">Not post yet!</span>
        @endforelse
    </ul>
    </div>
@endsection