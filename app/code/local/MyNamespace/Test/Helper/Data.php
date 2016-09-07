<?php

/**
 * Class MyNamespace_Test_Helper_Data
 */
class MyNamespace_Test_Helper_Data extends Mage_Core_Helper_Abstract
{
    /** Get test config field value by field name
     * @param string $field
     * @return mixed
     */
    public function getTestConfigFieldValue($field)
    {
        return Mage::getStoreConfig('test_options/messages/' . $field);
    }
}
