<?php

/**
 * Class MyNamespace_Test_Block_Result
 */
class MyNamespace_Test_Block_Greeting extends Mage_Core_Block_Template
{
    /** Get test helper
     *
     * @return Mage_Core_Block_Template $this
     */
    public function getTestHelper()
    {
        return Mage::helper('mynamespace_test');
    }
}
