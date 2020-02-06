<?php
namespace Magenest\Chapter6\Observer\Post;

class ChangeData implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magenest\Chapter6\Model\PostRepository
     */
    protected $_postRepository;

    /**
     * ChangeData constructor.
     * @param \Magenest\Chapter6\Model\PostRepository $postRepository
     */
    public function __construct(\Magenest\Chapter6\Model\PostRepository $postRepository)
    {
        $this->_postRepository = $postRepository;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this|void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $data = $observer->getData('data');
        $id = $observer->getData('id');
        $post = $this->_postRepository->getById($id);
        $post->setData($data);
        $this->_postRepository->save($post);
        return $this;
    }
}