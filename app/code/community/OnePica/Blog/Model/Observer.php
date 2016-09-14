<?php

/**
 * Class OnePica_Blog_Model_Observer
 */
class OnePica_Blog_Model_Observer
{
    /** Add news link to top menu
     *
     * @param Mage_Reports_Model_Event_Observer $observer
     * @return OnePica_News_Model_Observer
     */
    public function addToTopMenu($observer)
    {
        if (Mage::helper('onepica_blog')->getBlogConfigFieldValue('posts_show_for_customer')) {
            $menu = $observer->getMenu();
            $tree = $menu->getTree();
            $newsMenuItem = new Varien_Data_Tree_Node(array(
                    'name' => 'Blog',
                    'id' => 'blog',
                    'url' => '/blog',
                    'is_active' => (Mage::app()->getRequest()->getModuleName() === 'blog')
            ), 'id', $tree, $menu);
            $menu->addChild($newsMenuItem);
        }
    }
}
