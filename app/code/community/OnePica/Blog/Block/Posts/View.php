<?php

/**
 * Class OnePica_Blog_Block_Posts_View
 */
class OnePica_Blog_Block_Posts_View extends Mage_Core_Block_Template
{
    /** Current post model
     *
     * @var OnePica_Blog_Model_Post
     */
    public $post;

    /**
     * Get news post
     */
    public function getPost()
    {
        if (empty($this->post->getData())) {
            Mage::app()->getResponse()->setRedirect(Mage::getUrl(404));
        }

        return $this->post;
    }

    /**Get current post tags
     *
     * @return array
     */
    public function getTags()
    {
        return $this->post->getRelatedTags();
    }

    /** Get data helper
     *
     * @return Mage_Core_Helper_Abstract
     */
    public function getDataHelper()
    {
        return Mage::helper('onepica_blog');
    }
}
