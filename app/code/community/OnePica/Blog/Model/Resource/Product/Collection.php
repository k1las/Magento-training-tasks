<?php
/**
 * Product collection
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class OnePica_Blog_Model_Resource_Product_Collection extends Mage_Catalog_Model_Resource_Product_Collection
{
    /**Get product collection by tag name
     *
     * @param string $tagName
     * @return mixed
     */
    public function getProductsByTagName($tagName)
    {
        $ids = Mage::getModel('tag/tag')->loadByName($tagName)->getRelatedProductIds();

        return Mage::getModel('catalog/product')->getCollection()
                ->addAttributeToSelect('*')
                ->addFieldToFilter('entity_id', array('in' => $ids));
    }
}
