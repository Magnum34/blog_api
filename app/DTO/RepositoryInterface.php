<?php


namespace App\DTO;


interface RepositoryInterface
{
    /**
     * @param Post $post
     */
    public function add(Post $post): void;

    /**
     * @param int $id
     * @return Post
     */
    public function getById(int $id): Post;

    /**
     * @param int $id
     */
    public function remove(int $id): void;

    /**
     * @param Post $post
     * @return mixed
     */
    public function contains(Post $post);

    /**
     * @return array
     */
    public function all(): array;

}
