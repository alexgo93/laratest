<?php

namespace App\Services;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostService
{
    /**
     * @var PostRepository
     */
    protected $post;

    /**
     * PostService constructor.
     * @param PostRepository $post
     */
    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    /**
     * @return Post[]|Collection
     */
    public function index()
    {
        return $this->post->all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $attributes = $request->all();

        return $this->post->create($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function read($id)
    {
        return $this->post->get($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $attributes = $request->all();

        return $this->post->update($id, $attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->post->delete($id);
    }
}
