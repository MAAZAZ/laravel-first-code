<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // debug : dump and die
        //dd(\App\Post::all());
        return view('posts.index',
        [
            'posts' => Post::all()
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        /*$dataValid = $request->validate([
            'title' => 'bail|required|min:2|max:100',
            'content'=> 'required' 
            ]);*/
        //$post->title = $request->input('title');
        //$post->content= $request->input('content');
        //$post->slug = Str::slug($post->title,'-');
        //$post->active = false;
        //$post->save();


        $data= $request->only(['title', 'content']);
        $data['slug']= Str::slug($data['title'],'-');
        $data['active']=false;
        
        $post=Post::create($data);

        //dd($request->all());
        $request->session()->flash('status','Post was created');
        //return redirect('/posts');
        return redirect()->route('posts.index');
        //return redirect()->route('posts.show',[ 'post' => $post->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd(\App\Post::find($id));
        return view('posts.find',
        [
            'post' => Post::find($id)
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', 
            [ 'post' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $Myroutes = Post::findOrFail($id);
        $Myroutes->title = $request->input('title');
        $Myroutes->content = $request->input('content');
        $Myroutes->save();

        $request->session()->flash('status', 'Post was updated');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post = Post::findOrFail($id);
        //$post->delete();
        Post::destroy($id);
        return redirect()->route('posts.index');

    }
}
