<?php

/**
 * Class MyNamespace_Test_Model_Test
 */
class MyNamespace_Test_Model_Test extends Mage_Core_Model_Abstract
{
    /**
     * MyNamespace_Test_Model_Test init
     */
    protected function _construct()
    {
        $this->_init('test/test');
    }

    /** Customer tracking method
     * @param Mage_Customer_Model_Customer $customer
     * @param string $action
     * @return $this
     */
    public function trackCustomer(Mage_Customer_Model_Customer $customer, $action)
    {
        $this->setData(array('customer_id' => $customer->getId(), 'action' => $action));

        try {
            $this->save();
        } catch (Exception $e) {
            die($e->getMessage());
        }

        return $this;
    }
}
