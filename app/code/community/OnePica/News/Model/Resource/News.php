<?php

/**
 * Class OnePica_News_Model_Resource_News
 */
class OnePica_News_Model_Resource_News extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Table init
     */
    protected function _construct()
    {
        $this->_init('onepica_news/news', 'id');
    }
}
