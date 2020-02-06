<?php

namespace Magenest\Chapter6\Model;

use Magenest\Chapter6\Api\Data\PostInterface;
use Magenest\Chapter6\Api\PostRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var \Magenest\Chapter6\Model\PostFactory
     */
    protected $_postFactory;

    /**
     * @var ResourceModel\Post
     */
    protected $_postResource;

    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    protected $serializer;

    /**
     * @var Post[]
     */
    protected $instancesById = [];

    /**
     * @var Post[]
     */
    protected $instances = [];

    /**
     * @var int
     */
    private $cacheLimit = 0;

    /**
     * PostRepository constructor.
     * @param PostFactory $postFactory
     * @param ResourceModel\Post $postResource
     * @param \Magento\Framework\Serialize\Serializer\Json|null $serializer
     * @param int $cacheLimit
     */
    public function __construct(
        \Magenest\Chapter6\Model\PostFactory $postFactory,
        \Magenest\Chapter6\Model\ResourceModel\Post $postResource,
        \Magento\Framework\Serialize\Serializer\Json $serializer = null,
        $cacheLimit = 1000
    ) {
        $this->_postFactory = $postFactory;
        $this->_postResource = $postResource;
        $this->cacheLimit = (int)$cacheLimit;
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Magento\Framework\Serialize\Serializer\Json::class);
    }

    /**
     * @inheritDoc
     */
    public function save(PostInterface $post)
    {
        return $this->_postResource->save($post);
    }

    /**
     * @inheritDoc
     */
    public function getById($postId)
    {
        $cacheKey = $this->getCacheKey([]);
        if (!isset($this->instancesById[$postId][$cacheKey])) {
            $post = $this->_postFactory->create();
            $this->_postResource->load($post,$postId);
            if (!$post->getId()) {
                throw new NoSuchEntityException(
                    __("The product that was requested doesn't exist. Verify the product and try again.")
                );
            }
            $this->cacheProduct($cacheKey, $post);
        }
        return $this->instancesById[$postId][$cacheKey];
    }

    /**
     * @param $data
     * @return string
     */
    protected function getCacheKey($data)
    {
        $serializeData = [];
        foreach ($data as $key => $value) {
            if (is_object($value)) {
                $serializeData[$key] = $value->getId();
            } else {
                $serializeData[$key] = $value;
            }
        }
        $serializeData = $this->serializer->serialize($serializeData);
        return sha1($serializeData);
    }

    /**
     * @param $cacheKey
     * @param PostInterface $post
     */
    private function cacheProduct($cacheKey, PostInterface $post)
    {
        $this->instancesById[$post->getId()][$cacheKey] = $post;
        $this->savePostInLocalCache($post, $cacheKey);

        if ($this->cacheLimit && count($this->instances) > $this->cacheLimit) {
            $offset = round($this->cacheLimit / -2);
            $this->instancesById = array_slice($this->instancesById, $offset, null, true);
            $this->instances = array_slice($this->instances, $offset, null, true);
        }
    }

    /**
     * @param Post $post
     * @param string $cacheKey
     */
    private function savePostInLocalCache(Post $post, string $cacheKey): void
    {
        $preparedSku = $this->prepareId($post->getId());
        $this->instances[$preparedSku][$cacheKey] = $post;
    }

    /**
     * @param string $id
     * @return string
     */
    private function prepareId(string $id): string
    {
        return trim($id);
    }

    /**
     * @inheritDoc
     */
    public function delete(PostInterface $post)
    {
        return $this->_postResource->delete($post);

    }

    /**
     * @inheritDoc
     */
    public function deleteById($postId)
    {
        $post = $this->_postFactory->create();
        $this->_postResource->load($post,$postId);
        return $this->_postResource->delete($post);
    }

}