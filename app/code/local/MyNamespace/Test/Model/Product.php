<?php

/**
 * Class MyNamespace_Test_Model_Product
 */
class MyNamespace_Test_Model_Product extends Mage_Catalog_Model_Product
{
    /** Product object
     *
     * @var MyNamespace_Test_Model_Product $product
     */
    protected $product;

    /**
     * Get product price throught type instance
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->getProductWithMinimalPriceInCurrentCategory()->getData('price');
    }

    /** Get products with highest price
     *
     * @param int $limit
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    public function getProductsOrderedByHighestPrice($limit)
    {
        return $this->getCollection()->addAttributeToSelect('name')->addAttributeToSort('price', 'desc')->setPageSize($limit);;
    }

    /** Get product with minimal price in current product categories
     *
     * @return MyNamespace_Test_Model_Product
     */
    public function getProductWithMinimalPriceInCurrentCategory()
    {
        if (null === $this->product) {
            $this->product = $this->getCollection()->joinField(
                    'category_id', 'catalog/category_product', 'category_id',
                    'product_id = entity_id', null, 'left')
                    ->addAttributeToSelect('*')
                    ->addAttributeToFilter('category_id', array(
                            array('finset' => $this->getCategoryIds()),
                    ))
                    ->addAttributeToSort('price', 'asc')
                    ->getFirstItem();
        }
        return $this->product;
    }
}
