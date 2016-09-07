<?php

/**
 * Class MyNamespace_Test_Model_Resource_Test_Collection
 */
class MyNamespace_Test_Model_Resource_Test_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
    /**
     * Table init
     */
    protected function _construct()
    {
        $this->_init('test/test');
    }
}
