<?php

/**
 * Class OnePica_News_Model_YesNo
 */
class OnePica_News_Model_YesNo
{
    /** Set customer show options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
                array('value' => 0, 'label' => Mage::helper('onepica_news')->__('No')),
                array('value' => 1, 'label' => Mage::helper('onepica_news')->__('Yes')),
        );
    }
}
