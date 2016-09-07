<?php

/**
 * Class MyNamespace_Test_Model_Resource_Test
 */
class MyNamespace_Test_Model_Resource_Test extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Table init
     */
    protected function _construct()
    {
        $this->_init('test/test', 'tracking_id');
    }
}
