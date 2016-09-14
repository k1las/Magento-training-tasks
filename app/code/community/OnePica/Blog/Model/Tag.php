<?php

/**
 * Class OnePica_Blog_Model_Tag
 */
class OnePica_Blog_Model_Tag extends Mage_Tag_Model_Tag
{
    /**
     * Retrieves array of related post IDs
     *
     * @return array
     */
    public function getRelatedPosts($page = null, $pageSize = null)
    {
        $postIds = Mage::getModel('onepica_blog/post_relation')
                ->setTagId($this->getTagId())
                ->getPostIds();

        $posts = Mage::getModel('onepica_blog/post')
                ->getCollection()
                ->addAttributeToSelect('*')
                ->addFieldToFilter('entity_id', array('in' => $postIds))
                ->addAttributeToFilter('published', true)
                ->addAttributeToFilter('start_publishing', array(
                        array('to' => Mage::getModel('core/date')->gmtDate()),
                        array('start_publishing', 'null' => '')))
                ->addAttributeToFilter('end_publishing', array(
                        array('gteq' => Mage::getModel('core/date')->gmtDate()),
                        array('end_publishing', 'null' => '')));

        if ($page !== null) {
            $posts->setCurPage($page);
        }

        if ($pageSize !== null) {
            $posts->setPageSize($pageSize);
        }

        return $posts;
    }
}
