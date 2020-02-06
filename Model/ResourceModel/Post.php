<?php
namespace Magenest\Chapter6\Model\ResourceModel;
class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_post',
            'post_id');
    }
}