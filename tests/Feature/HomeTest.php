<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    
    public function testHomePage()
    {
        $response = $this->get('/home');

        //$response->assertStatus(200);
        $response->assertSeeText('hello');
    }
}
