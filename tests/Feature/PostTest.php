<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class PostTest extends TestCase
{
     use RefreshDatabase;

    public function testSavePost()
    {
        $post=new Post();
        $post->title='maazaz zakaria';
        $post->content='maazaz zakaria';
        $post->slug=Str::slug($post->title,'_');
        $post->active=false;
        $post->save();

        //$this->assertDatabaseMissing('posts');
        $this->assertDatabaseHas(
            'posts', [
                'title' => 'maazaz zakaria'
            ]);
    }

    public function postStoreTest(){
        $data=[
            'title'=> 'maazaz zakaria',
            'content' => 'maazaz zakaria',
            'slug' => Str::slug('maazaz zakaria', '_'),
            'active' => false
        ];

        $this->post('/posts',$data)->assertStatus(302)->assertSessionHas('status');
        $this->assertEquals(session('status'), 'Post was created!!');
    }

    public function postUpdateTest()
    {
        $post = new Post();
        $post->title = 'maazaz zakaria';
        $post->content = 'maazaz zakaria';
        $post->slug = Str::slug($post->title, '_');
        $post->active = false;
        $post->save();
        $this->assertDatabaseHas('posts',$post->toArray());

        $data = [
            'title' => 'maazaz zakaria',
            'content' => 'maazaz zakaria',
            'slug' => Str::slug('maazaz zakaria', '_'),
            'active' => false
        ];

        $this->put("/posts/{$post->id}/edit", $data)->assertStatus(302)->assertSessionHas('status');
        $this->assertDatabaseHas('posts', $data);
    }

    public function postDeleteTest()
    {
        $post = new Post();
        $post->title = 'maazaz zakaria';
        $post->content = 'maazaz zakaria';
        $post->slug = Str::slug($post->title, '_');
        $post->active = false;
        $post->save();
        $this->assertDatabaseHas('posts', $post->toArray());
        $this->delete("/posts/{$post->id}", $post->toArray())->assertStatus(302)->assertSessionHas('status');
        $this->assertDatabaseMissing('posts', $post->toArray());
    }

}
