<?php

namespace Magenest\Chapter6\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \Magenest\Chapter6\Model\PostRepository
     */
    protected $_postRepository;

    /**
     * Delete constructor.
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
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if (!$this->_postRepository->getById($id)->getData()) {
            $this->messageManager->addErrorMessage(__('Unable to proceed. Please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/edit');
        }else{
            try {
                if ($id){
                    $this->_postRepository->deleteById($id);
                    $this->messageManager->addSuccessMessage(__('Your post has been deleted !'));
                }
            }catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error while trying to delete post: '));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/edit');
            }
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/edit');
    }
}

