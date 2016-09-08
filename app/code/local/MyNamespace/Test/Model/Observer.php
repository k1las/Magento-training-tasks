<?php

/**
 * Class MyNamespace_Test_Model_Observer
 */
class MyNamespace_Test_Model_Observer
{
    /**Customer login observer
     * @param Varien_Event_Observer $observer
     */
    public function customerLogin(Varien_Event_Observer $observer)
    {
        Mage::getModel('test/test')->trackCustomer($observer->getCustomer(),'login');
    }

    /**Customer logout observer
     * @param Varien_Event_Observer $observer
     */
    public function customerLogout(Varien_Event_Observer $observer)
    {
        Mage::getModel('test/test')->trackCustomer($observer->getCustomer(),'logout');
    }
}
