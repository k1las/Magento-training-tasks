<?php

/**
 * Class OnePica_News_Block_Adminhtml_News
 */
class OnePica_News_Block_Adminhtml_News extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * OnePica_News_Block_Adminhtml_News constructor.
     */
    public function __construct()
    {
        $this->_blockGroup = 'onepica_news';
        $this->_controller = 'adminhtml_news';
        $this->_headerText = Mage::helper('onepica_news')->__('News');

        parent::__construct();
    }
}
