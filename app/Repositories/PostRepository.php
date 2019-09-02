<?php

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PostRepository
 * @package App\Repositories
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * @var Post $post
     */
    protected $post;

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->post->create($attributes);
    }

    /**
     * @return Post[]|Collection
     */
    public function all()
    {
        return $this->post->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->post->find($id);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        return $this->post->find($id)->update($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->post->find($id)->delete();
    }
}
