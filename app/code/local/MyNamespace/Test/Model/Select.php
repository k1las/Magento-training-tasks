<?php

/**
 * Class MyNamespace_Test_Model_Select
 */
class MyNamespace_Test_Model_Select
{
    /** Set select options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
                array('value' => 1, 'label' => Mage::helper('mynamespace_test')->__('Enable')),
                array('value' => 0, 'label' => Mage::helper('mynamespace_test')->__('Disable')),
        );
    }
}
