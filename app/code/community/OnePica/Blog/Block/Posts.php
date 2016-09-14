<?php

/**
 * Class OnePica_Blog_Block_Posts
 */
class OnePica_Blog_Block_Posts extends Mage_Core_Block_Template
{
    /** Posts count per page from config
     *
     * @var int
     */
    private $postsPerPage;

    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->postsPerPage = $this->getConfigHelper()->getBlogConfigFieldValue('posts_per_page');
    }

    /** Prepare layout
     *
     * @return OnePica_Blog_Block_Posts
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array($this->postsPerPage => $this->postsPerPage));
        $pager->setCollection($this->getPosts());
        $this->setChild('pager', $pager);

        return $this;
    }

    /**Get all posts
     *
     * @return OnePica_Blog_Model_Resource_Post_Collection
     */
    public function getPosts()
    {
        $page = 1;
        $p = $this->getRequest()->get('p');
        if ($p) {
            $page = $p;
        }

        $search = $this->getRequest()->get('q');

        if (isset($search)) {
            return Mage::getModel('tag/tag')->loadByName($search)->getRelatedPosts($page, $this->postsPerPage);
        }

        return Mage::getModel('onepica_blog/post')->getCollection()->getPosts($page, $this->postsPerPage);
    }

    /** Get helper
     *
     * @return Mage_Core_Helper_Abstract
     */
    public function getConfigHelper()
    {
        return Mage::helper('onepica_blog');
    }
}
