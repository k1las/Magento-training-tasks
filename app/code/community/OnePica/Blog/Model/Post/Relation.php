<?php

/**
 * Class OnePica_Blog_Model_Post_Relation
 */
class OnePica_Blog_Model_Post_Relation extends Mage_Core_Model_Abstract
{
    /**
     * Init table
     */
    protected function _construct()
    {
        $this->_init('onepica_blog/post_relation');
    }

    /**
     * Retrieve Relation Post Ids
     *
     * @return array
     */
    public function getPostIds()
    {
        $ids = $this->getData('post_ids');
        if ($ids === null) {
            $ids = $this->_getResource()->getPostIds($this);
            $this->setPostIds($ids);
        }
        return $ids;
    }

    /**
     * Retrieve Relation Post Ids
     *
     * @return array
     */
    public function getTagIds()
    {
        $ids = $this->getData('tag_ids');
        if ($ids === null) {
            $ids = $this->_getResource()->getTagIds($this);
            $this->setTagIds($ids);
        }
        return $ids;
    }
}
