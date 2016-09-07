<?php

/**
 * Class MyNamespace_Test_Model_Observer
 */
class MyNamespace_Test_Model_Observer
{
    /**Customer login observer
     * @param Mage_Reports_Model_Event_Observer $Observer
     */
    public function customerLogin($Observer)
    {
        Mage::getModel('test/test')->trackCustomer($Observer->getCustomer(),'login');
    }

    /**Customer logout observer
     * @param Mage_Reports_Model_Event_Observer $Observer
     */
    public function customerLogout($Observer)
    {
        Mage::getModel('test/test')->trackCustomer($Observer->getCustomer(),'logout');
    }
}
