<?php
namespace Magenest\Chapter6\Api;

use Magenest\Chapter6\Api\Data\PostInterface;

interface PostRepositoryInterface
{
    /**
     * Create or update a data
     */
    public function save(PostInterface $post);

    /**
     * Get post by id
     */
    public function getById($postId);

    /**
     * Delete $post.
     */
    public function delete(PostInterface $post);

    /**
     * Delete $post by ID.
     */
    public function deleteById($postId);
}