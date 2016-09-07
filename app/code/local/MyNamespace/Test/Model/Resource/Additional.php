<?php

/**
 * Class MyNamespace_Test_Model_Resource_Test
 */
class MyNamespace_Test_Model_Resource_Additional extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Table init
     */
    protected function _construct()
    {
        $this->_init('test/additional', 'id');
    }
}
