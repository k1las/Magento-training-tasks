<?php

/**
 * Class OnePica_News_Model_News
 */
class OnePica_News_Model_News extends Mage_Core_Model_Abstract
{
    /**
     * Init news table
     */
    protected function _construct()
    {
        $this->_init('onepica_news/news');
    }
}
