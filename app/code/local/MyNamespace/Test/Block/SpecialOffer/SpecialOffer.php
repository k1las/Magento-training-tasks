<?php

/**
 * Class MyNamespace_Test_Block_SpecialOffer_SpecialOffer
 */
class MyNamespace_Test_Block_SpecialOffer_SpecialOffer extends Mage_Core_Block_Template
{
    /** Get special product
     *
     * @return mixed
     */
    public function getSpecialProduct()
    {
        return Mage::registry('current_product')->getProductWithMinimalPriceInCurrentCategory();
    }

    /** Check, is current product is special
     * @param Mage_Catalog_Model_Product $specialProduct
     * @return bool
     */
    public function isCurrentProductSpecial($specialProduct)
    {
        return (Mage::registry('current_product')->getId() === $specialProduct->getId());
    }
}
