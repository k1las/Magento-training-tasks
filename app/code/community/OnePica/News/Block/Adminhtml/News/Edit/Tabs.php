<?php

/**
 * Class OnePica_News_Block_Adminhtml_News_Edit_Tabs
 */
class OnePica_News_Block_Adminhtml_News_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * OnePica_News_Block_Adminhtml_News_Edit_Tabs constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('onepica_news_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('onepica_news')->__('News Information'));
    }
}
