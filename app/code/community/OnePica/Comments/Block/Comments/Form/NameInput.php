<?php

/**
 * Class OnePica_Comments_Block_Comments_Form_NameInput
 */
class OnePica_Comments_Block_Comments_Form_NameInput extends Mage_Core_Block_Template
{
    /**To html
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->helper('comments/config')->loginRequired() && !Mage::getSingleton('customer/session')->isLoggedIn()) {
            return parent::_toHtml();
        }
        return '';
    }
}
