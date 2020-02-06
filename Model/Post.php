<?php
namespace Magenest\Chapter6\Model;
use Magenest\Chapter6\Api\Data\PostInterface;
use Magento\Framework\Api\CustomAttributesDataInterface;

class Post extends \Magento\Framework\Model\AbstractModel implements PostInterface {
    /**
     * Post constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource
        $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb
        $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource,
            $resourceCollection, $data);
    }
    public function _construct() {
        $this->_init('Magenest\Chapter6\Model\ResourceModel\Post');
    }

    /**
     * @inheritDoc
     */
    public function getCustomAttribute($attributeCode)
    {
        // TODO: Implement getCustomAttribute() method.
    }

    /**
     * @inheritDoc
     */
    public function setCustomAttribute($attributeCode, $attributeValue)
    {
        // TODO: Implement setCustomAttribute() method.
    }

    /**
     * @inheritDoc
     */
    public function getCustomAttributes()
    {
        // TODO: Implement getCustomAttributes() method.
    }

    /**
     * @inheritDoc
     */
    public function setCustomAttributes(array $attributes)
    {
        // TODO: Implement setCustomAttributes() method.
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return (string) $this->getData('name');
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        $this->setData('name',$name);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getUrlKey()
    {
        return (string) $this->getData('url_key');
    }

    /**
     * @inheritDoc
     */
    public function setUrlKey($urlKey)
    {
        $this->setData('url_key',$urlKey);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPostContent()
    {
        return (string) $this->getData('post_content');
    }

    /**
     * @inheritDoc
     */
    public function setPostContent($postContent)
    {
        $this->setData('post_content',$postContent);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTags()
    {
        return (string) $this->getData('tags');
    }

    /**
     * @inheritDoc
     */
    public function setTags($tags)
    {
        $this->setData('tags',$tags);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return (int) $this->getData('status');
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status)
    {
        $this->setData('status',$status);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFeatureImage()
    {
        return (string) $this->getData('feature_image');
    }

    /**
     * @inheritDoc
     */
    public function setFeatureImage($featureImage)
    {
        $this->setData('feature_image',$featureImage);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return (string) $this->getData('created_at');
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData('created_at',$createdAt);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return (string) $this->getData('updated_at');
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->setData('updated_at',$updatedAt);
        return $this;
    }
}
