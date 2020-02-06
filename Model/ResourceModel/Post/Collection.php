<?php
namespace Magenest\Chapter6\Model\ResourceModel\Post;
/**
 * Subscription Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct() {
        $this->_init('Magenest\Chapter6\Model\Post',
            'Magenest\Chapter6\Model\ResourceModel\Post');
    }
}