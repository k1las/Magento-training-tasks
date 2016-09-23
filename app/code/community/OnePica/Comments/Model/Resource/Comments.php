<?php

/**
 * Class OnePica_Comments_Model_Resource_Comments
 */
class OnePica_Comments_Model_Resource_Comments extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Init
     */
    protected function _construct()
    {
        $this->_init('comments/comments', 'id');
    }
}
