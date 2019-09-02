<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function get($postId);

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($postId);

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($postId, array $postData);
}
