<?php


namespace Tests\Feature;

use Tests\TestCase;
use App\Service\PostAPIService;

class PostTest extends TestCase
{

    public function testPostList()
    {
        $this->json('GET', '/api/posts')
            ->assertStatus(200);
    }

    public function testPost()
    {
        $this->json('GET', '/api/posts/2')
            ->assertStatus(200)
            ->assertJsonStructure([
                "userId",
                "id",
                "title",
                "body"
            ]);
    }
}
