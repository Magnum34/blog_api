<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\DTO\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostServiceTest extends TestCase
{

    public function testPostListService()
    {
        $this->assertCount(100, $this->service->getAllPosts());
    }

    public function testPostService()
    {
        $this->assertInstanceOf(Post::class, $this->service->getPost(1));
    }
}
