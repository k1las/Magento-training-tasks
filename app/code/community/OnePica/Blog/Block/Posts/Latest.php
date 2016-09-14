<?php

/**
 * Class OnePica_Blog_Block_Posts
 */
class OnePica_Blog_Block_Posts_Latest extends Mage_Core_Block_Template
{
    /** Get latest news
     *
     * @return OnePica_Blog_Model_Resource_Post_Collection
     */
    public function getLatestPosts()
    {
        return Mage::getModel('onepica_blog/post')->getCollection()->getLatestPosts();
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
