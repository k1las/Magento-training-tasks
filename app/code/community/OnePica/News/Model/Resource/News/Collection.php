<?php

/**
 * Class OnePica_News_Model_Resource_News_Collection
 */
class OnePica_News_Model_Resource_News_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Table init
     */
    protected function _construct()
    {
        $this->_init('onepica_news/news');
    }

    /** Get latest news
     *
     * @return OnePica_News_Model_Resource_News_Collection
     */
    public function getLatestNews()
    {
        return $this->setOrder('id', 'desc')
                ->addFieldToFilter('published', true)
                ->addFieldToFilter('start_publishing', array(
                        array('to' => Mage::getModel('core/date')->gmtDate()),
                        array('start_publishing', 'null' => '')))
                ->addFieldToFilter('end_publishing', array(
                        array('gteq' => Mage::getModel('core/date')->gmtDate()),
                        array('end_publishing', 'null' => '')))
                ->setPageSize(Mage::helper('onepica_news')
                        ->getNewsConfigFieldValue('news_count_in_block'));
    }

    /**Get single record by id
     *
     * @param int $id
     * @return OnePica_News_Model_Resource_News_Collection
     */
    public function getNewsPostById($id)
    {
        return $this->addFieldToFilter('id', $id)
                ->addFieldToFilter('published', true)
                ->addFieldToFilter('start_publishing', array(
                        array('to' => Mage::getModel('core/date')->gmtDate()),
                        array('start_publishing', 'null' => '')))
                ->addFieldToFilter('end_publishing', array(
                        array('gteq' => Mage::getModel('core/date')->gmtDate()),
                        array('end_publishing', 'null' => '')))
                ->getFirstItem();
    }

    /**Get news by params
     *
     * @param int $page
     * @param int $pageSize
     * @return OnePica_News_Model_Resource_News_Collection
     */
    public function getNews($page, $pageSize)
    {
        return $this->addFieldToFilter('published', true)
                ->addFieldToFilter('start_publishing', array(
                        array('to' => Mage::getModel('core/date')->gmtDate()),
                        array('start_publishing', 'null' => '')))
                ->addFieldToFilter('end_publishing', array(
                        array('gteq' => Mage::getModel('core/date')->gmtDate()),
                        array('end_publishing', 'null' => '')))
                ->setCurPage($page)
                ->setPageSize($pageSize);
    }
}
