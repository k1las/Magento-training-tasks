<?php

/**
 * Class OnePica_Blog_Model_YesNo
 */
class OnePica_Blog_Model_YesNo
{
    /** Set customer show options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
                array('value' => 0, 'label' => Mage::helper('onepica_blog')->__('No')),
                array('value' => 1, 'label' => Mage::helper('onepica_blog')->__('Yes')),
        );
    }
}
