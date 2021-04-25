<?php


namespace App\DTO;

use App\DTO\Core\Entity;

/**
 * Class Post
 * @package App\DTO
 *
 */
class Post extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userId', 'id', 'title', 'body'];


    /**
     * @var int
     *
     */
    public int $userId;

    /**
     * @var int
     *
     */
    public int $id;

    /**
     * @var string
     *
     */
    public string $title;

    /**
     * @var string
     *
     */
    public string $body;
}
