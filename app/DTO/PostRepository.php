<?php


namespace App\DTO;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostRepository implements RepositoryInterface
{
    /**
     * @var array
     */
    private array $posts;

    /**
     * PostRepository constructor.
     */
    public function __construct()
    {
        $this->posts = [];
    }

    public function add(Post $post): void
    {
        $this->posts[$post->getId()] = $post;
    }

    public function getById(int $id): Post
    {
        if(!array_key_exists($id, $this->posts)){
            throw new NotFoundHttpException();
        }
        return $this->posts[$id];
    }

    public function remove(int $id): void
    {
        unset($this->posts[$id]);
    }

    public function contains(Post $post)
    {
        return array_key_exists($post->getId(),$this->posts);
    }

    public function all(): array{
        return $this->posts;
    }
}
