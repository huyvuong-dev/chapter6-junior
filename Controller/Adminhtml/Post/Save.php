<?php

namespace Magenest\Chapter6\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magenest\Chapter6\Model\PostRepository
     */
    protected $_postRepository;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param \Magenest\Chapter6\Model\PostRepository $postRepository
     */
    public function __construct(
        Action\Context $context,
        \Magenest\Chapter6\Model\PostRepository $postRepository
    )
    {
        $this->_postRepository = $postRepository;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        //$id = $this->getRequest()->getParam('post_id');
        $post = null;
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['post_id']) ? $data['post_id'] : null;
        if ($id){
            $this->_eventManager->dispatch('post_before_save', ['data' => $data,'id' => $id]);
            $this->messageManager->addSuccessMessage(__('You saved the post'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/edit',['id'=>$id]);
    }
}

