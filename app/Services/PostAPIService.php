<?php


namespace App\Services;

use App\DTO\Core\ConvertStdClass;
use App\DTO\Post;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use JMS\Serializer\SerializerBuilder;

class PostAPIService implements HandlerInterface
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @var string|\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private string $url;

    /**
     * PostAPIService constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'cache-control' => 'no-cache',
            'content-type' => 'application/json'
        ]);
        $this->url = config('api.url');
    }

    /**
     * @param int $postId
     * @return Post
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPost(int $postId): Post
    {
        try {
            $request = $this->client->get($this->url . '/posts/' . $postId, [
                'timeout' => 30,
                'connect_timeout' => true,
                'http_errors' => true
            ]);
            if (!$request->getStatusCode() == 200) {
                throw new ServerException('No Connection API!');
            }
            $response = json_decode($request->getBody()->getContents());
            return ConvertStdClass::recast(Post::class, $response);
        } catch (ServerException $ex) {
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage()
            ], 500);
        } catch (ClientException $ex) {
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllPosts(): array
    {
        try {
            $request = $this->client->get($this->url . '/posts', [
                'timeout' => 30,
                'connect_timeout' => true,
                'http_errors' => true
            ]);
            if (!$request->getStatusCode() == 200) {
                throw new ServerException('No Connection API!');
            }
            $response = json_decode($request->getBody()->getContents());
            return ConvertStdClass::recastArray(Post::class, $response);
        } catch (ServerException $ex) {
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage()
            ], 500);
        } catch (ClientException $ex) {
            return response()->json([
                'status' => 'error',
                'code' => $ex->getCode(),
                'message' => $ex->getMessage()
            ], 400);
        }
    }
}
