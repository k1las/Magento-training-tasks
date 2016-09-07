<?php

/**
 * Class MyNamespace_Test_Block_Result
 */
class MyNamespace_Test_Block_Result extends Mage_CatalogSearch_Block_Result
{
    /** Get products with highest price
     *
     * @param int $limit
     * @return string
     */
    public function getProductsOrderedByHighestPrice($limit = 6)
    {
        $this->getListBlock()->setCollection(Mage::getModel('catalog/product')->getProductsOrderedByHighestPrice($limit));
        return $this->getProductListHtml();
    }
}
