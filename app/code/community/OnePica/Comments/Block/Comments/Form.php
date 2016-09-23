<?php

/**
 * Class OnePica_Comments_Block_Comments_Form
 */
class OnePica_Comments_Block_Comments_Form extends Mage_Core_Block_Template
{
    /**To html
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->helper('comments/config')->enableComments()) {
            return '';
        }
        if ($this->helper('comments/config')->loginRequired()) {
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
                return '';
            }
        }

        return parent::_toHtml();
    }
}
