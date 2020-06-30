<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
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

        $this->assertDatabaseHas(
            'posts', [
                'title' => 'maazaz zakaria',
                'content' => 'maazaz zakaria',
                'slug' => 'maazaz_zakaria',
                'active' => false
            ]
        )

    }
}
