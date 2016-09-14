<?php

/**
 * Class OnePica_News_IndexController
 */
class OnePica_Blog_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Pre dispatch
     */
    public function preDispatch()
    {
        if (!Mage::helper('onepica_blog')->getBlogConfigFieldValue('posts_show_for_customer')) {
            $this->_forward(404);
        }
        parent::_construct();
    }

    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * View Action
     */
    public function viewAction()
    {
        $post = Mage::getModel('onepica_blog/post')->getCollection()->getPostById($this->getRequest()->get('id'));
        $this->loadLayout();
        $layout = $this->getLayout();
        $layout->getBlock('view.blog.post')->post = $post;

        $head = $layout->getBlock('head');
        $head->setTitle($post->getTitle());
        $head->setKeywords($post->getKeywords());
        $head->setDescription($post->getDescription());
        $this->renderLayout();
    }
}
