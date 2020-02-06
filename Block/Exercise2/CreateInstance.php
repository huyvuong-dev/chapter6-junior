<?php
namespace Magenest\Chapter6\Block\Exercise2;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\App\ObjectManager;
use Magenest\Chapter6\Model\Post;
use Magenest\Chapter6\Model\PostRepository;

class CreateInstance extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Post
     */
    protected $_post;

    /**
     * @var PostRepository
     */
    protected $_postRepository;

    /**
     * CreateInstance constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param Post $post
     * @param PostRepository $postRepository
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Post $post,
        PostRepository $postRepository,
        array $data = []
    ) {
        $this->_post = $post;
        $this->_postRepository = $postRepository;
        parent::__construct($context, $data);
    }

    /**
     * Create a instance using Construct
     * @return string
     */
    public function getProductFieldNameUsingConstruct(){
        return $this->_post->getIdFieldName();
    }

    /**
     * Create a instance using Object Manager
     * @return string
     */
    public function getProductFieldNameUsingObjectManager(){
        $objectManager = ObjectManager::getInstance();
        $post = $objectManager->create(Post::class);
        return $post->getIdFieldName();
    }

    /**
     * Create a instance using Repository
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProductFieldNameUsingRepository(){
        return $this->_postRepository->getById(1)->getIdFieldName();
    }
}