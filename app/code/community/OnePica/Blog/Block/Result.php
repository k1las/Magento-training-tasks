<?php

/**
 * Class OnePica_Blog_Block_Result
 */
class OnePica_Blog_Block_Result extends Mage_CatalogSearch_Block_Result
{
    /**Get product list block html
     *
     * @return string
     */
    public function getProductsByTagHtml()
    {
        $productTagsBlock = $this->getListBlock()
                ->setCollection(
                        Mage::getModel('catalog/product')->getCollection()->getProductsByTagName($this->getRequest()->get('q')
                        ));
        $this->getLayout()->addBlock('tags_block', $productTagsBlock);

        return $productTagsBlock->toHtml();
    }
}
