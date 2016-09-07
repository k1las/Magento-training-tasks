<?php

/**
 * Class MyNamespace_Test_Model_Catalog_Config
 */
class MyNamespace_Test_Model_Catalog_Config extends Mage_Catalog_Model_Config
{
    /** Add custom sorting attribute
     * @return array
     */
    public function getAttributeUsedForSortByArray()
    {
        $options = array(
                'created_at' => Mage::helper('catalog')->__('Product Creation Date')
        );

        foreach ($this->getAttributesUsedForSortBy() as $attribute) {
            $options[$attribute->getAttributeCode()] = $attribute->getStoreLabel();
        }

        return $options;
    }
}
