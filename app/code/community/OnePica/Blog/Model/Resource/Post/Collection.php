<?php

/**
 * Class OnePica_Blog_Model_Resource_Post_Collection
 */
class OnePica_Blog_Model_Resource_Post_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    /**
     * Init
     */
    protected function _construct()
    {
        $this->_init('onepica_blog/post');
    }

    /** Get latest news
     *
     * @return OnePica_News_Model_Resource_News_Collection
     */
    public function getLatestPosts()
    {
        return $this->setOrder('entity_id', 'desc')
                ->addAttributeToSelect('title')
                ->addAttributeToFilter('published', 1)
                ->addAttributeToFilter('start_publishing', array(
                        array('to' => Mage::getModel('core/date')->gmtDate()),
                        array('start_publishing', 'null' => '')))
                ->addAttributeToFilter('end_publishing', array(
                        array('gteq' => Mage::getModel('core/date')->gmtDate()),
                        array('end_publishing', 'null' => '')))
                ->setPageSize(Mage::helper('onepica_blog')
                        ->getBlogConfigFieldValue('posts_count_in_block'));
    }

    /**Get single record by id
     *
     * @param int $id
     * @return OnePica_Blog_Model_Resource_Post_Collection
     */
    public function getPostById($id)
    {
        return $this->addFieldToFilter('entity_id', $id)
                ->addAttributeToSelect('*')
                ->addAttributeToFilter('published', true)
                ->addAttributeToFilter('start_publishing', array(
                        array('to' => Mage::getModel('core/date')->gmtDate()),
                        array('start_publishing', 'null' => '')))
                ->addAttributeToFilter('end_publishing', array(
                        array('gteq' => Mage::getModel('core/date')->gmtDate()),
                        array('end_publishing', 'null' => '')))
                ->getFirstItem();
    }

    /**Get posts by params
     *
     * @param int $page
     * @param int $pageSize
     * @return OnePica_Blog_Model_Resource_Post_Collection
     */
    public function getPosts($page, $pageSize)
    {
        return $this->addAttributeToSelect('*')
                ->addAttributeToFilter('published', true)
                ->addAttributeToFilter('start_publishing', array(
                        array('to' => Mage::getModel('core/date')->gmtDate()),
                        array('start_publishing', 'null' => '')))
                ->addAttributeToFilter('end_publishing', array(
                        array('gteq' => Mage::getModel('core/date')->gmtDate()),
                        array('end_publishing', 'null' => '')))
                ->setCurPage($page)
                ->setPageSize($pageSize);
    }
}
