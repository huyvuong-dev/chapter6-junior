<?php
namespace Magenest\Chapter6\Api\Data;

interface PostInterface extends \Magento\Framework\Api\CustomAttributesDataInterface
{
    /**#@+
     * Constants defined for keys of the data array. Identical to the name of the getter in snake case
     */
    const ID = 'post_id';
    const NAME = 'name';
    const URL_KEY = 'url_key';
    const POST_CONTENT = 'post_content';
    const TAGS = 'tags';
    const STATUS = 'status';
    const FEATURE_IMAGE = 'feature_image';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * Get post id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set post id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get post name
     * @return string|null
     */
    public function getName();

    /**
     * Set post name
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get post url key
     * @return string|null
     */
    public function getUrlKey();

    /**
     * Set post url key
     * @param $urlKey
     * @return $this
     */
    public function setUrlKey($urlKey);

    /**
     * Get post content
     * @return string|null
     */
    public function getPostContent();

    /**
     * Set post content
     * @param $postContent
     * @return $this
     */
    public function setPostContent($postContent);

    /**
     * Get post tags
     * @return string|null
     */
    public function getTags();

    /**
     * Set post tags
     * @param $tags
     * @return string|null
     */
    public function setTags($tags);

    /**
     * Get post status
     * @return int|null
     */
    public function getStatus();

    /**
     * Set post status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get post feature image
     * @return string|null
     */
    public function getFeatureImage();

    /**
     * Set post feature image
     * @param $featureImage
     * @return $this
     */
    public function setFeatureImage($featureImage);

    /**
     * Post created date
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set Post created date
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Post updated date
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set Post updated date
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
}