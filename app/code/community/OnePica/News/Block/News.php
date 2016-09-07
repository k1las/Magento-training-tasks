<?php

/**
 * Class OnePica_News_Block_News
 */
class OnePica_News_Block_News extends Mage_Core_Block_Template
{
    /** News count per page from config
     *
     * @var int
     */
    private $newsPerPage;

    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->newsPerPage = Mage::helper('onepica_news')->getNewsConfigFieldValue('news_per_page');
    }

    /** Prepare layout
     *
     * @return OnePica_News_Block_News
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array($this->newsPerPage => $this->newsPerPage));
        $pager->setCollection($this->getNews());
        $this->setChild('pager', $pager);

        return $this;
    }

    /** Get latest news
     *
     * @return OnePica_News_Model_Resource_News_Collection
     */
    public function getLatestNews()
    {
        return Mage::getModel('onepica_news/news')->getCollection()->getLatestNews();
    }

    /**Get all news
     *
     * @return OnePica_News_Model_Resource_News_Collection
     */
    public function getNews()
    {
        $page = 1;
        $p = $this->getRequest()->get('p');
        if ($p) {
            $page = $p;
        }
        return Mage::getModel('onepica_news/news')->getCollection()->getNews($page, $this->newsPerPage);
    }

    /** Get helper
     *
     * @return Mage_Core_Helper_Abstract
     */
    public function getConfigHelper()
    {
        return Mage::helper('onepica_news');
    }
}
