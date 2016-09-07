<?php

/**
 * Class MyNamespace_Test_Model_Multiselect
 */
class MyNamespace_Test_Model_Multiselect
{
    /** Set Multiselect options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
                array('value' => 1, 'label' => Mage::helper('mynamespace_test')->__('1')),
                array('value' => 2, 'label' => Mage::helper('mynamespace_test')->__('2')),
                array('value' => 3, 'label' => Mage::helper('mynamespace_test')->__('3')),
                array('value' => 4, 'label' => Mage::helper('mynamespace_test')->__('4')),
                array('value' => 5, 'label' => Mage::helper('mynamespace_test')->__('5')),
        );
    }
}
