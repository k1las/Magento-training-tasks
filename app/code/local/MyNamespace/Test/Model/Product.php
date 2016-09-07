<?php

/**
 * Class MyNamespace_Test_Model_Product
 */
class MyNamespace_Test_Model_Product extends Mage_Catalog_Model_Product
{
    /**
     * Get product price throught type instance
     *
     * @return int
     */
    public function getPrice()
    {
        $this->getCollection()->joinField(
                'category_id', 'catalog/category_product', 'category_id',
                'product_id = entity_id', null, 'left'
        )
                ->addAttributeToFilter('category_id', array(
                        array('finset' => $this->getCategoryIds()),
                ))
                ->addAttributeToSort('price', 'asc')
                ->getFirstItem();

        return $this->getData('price');
    }

    /** Get products with highest price
     *
     * @param int $limit
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    public function getProductsOrderedByHighestPrice($limit)
    {
        return $this->getCollection()->addAttributeToSelect('name')->addAttributeToSort('price', 'desc')->setPageSize($limit);
    }
}
