<?php

/**
 * Class OnePica_Blog_Block_TagsCloud
 */
class OnePica_Blog_Block_TagsCloud extends Mage_Core_Block_Template
{
    /** Get tags
     *
     * @return Mage_Tag_Model_Tag
     */
    public function getTags()
    {
        return Mage::getModel('tag/tag')->getCollection();
    }

    /**Get data helper
     * @return Mage_Core_Helper_Abstract
     */
    public function getDataHelper()
    {
        return Mage::helper('onepica_blog');
    }
}
