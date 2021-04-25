<?php

namespace App\Services;

use App\DTO\Post;

interface HandlerInterface {

    /**
     * @param int $postId
     * @return Post
     */
    public function getPost(int $postId): Post;

    /**
     * @return array
     */
    public function getAllPosts(): array;

}
