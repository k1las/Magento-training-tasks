<?php

/**
 * Class OnePica_Comments_Model_Comments
 */
class OnePica_Comments_Model_Comments extends Mage_Core_Model_Abstract
{
    /**
     * Init
     */
    protected function _construct()
    {
        $this->_init('comments/comments');
    }

    /**Get customer model
     *
     * @return OnePica_Comments_Model_Comments
     */
    public function getAuthor()
    {
        return Mage::getModel('customer/customer')->load($this->getCustomerId());
    }
}
