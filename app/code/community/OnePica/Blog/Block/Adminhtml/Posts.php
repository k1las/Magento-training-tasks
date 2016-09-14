<?php

/**
 * Class OnePica_Blog_Block_Adminhtml_Posts
 */
class OnePica_Blog_Block_Adminhtml_Posts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * OnePica_Blog_Block_Adminhtml_Posts constructor.
     */
    public function __construct()
    {
        $this->_blockGroup = 'onepica_blog';
        $this->_controller = 'adminhtml_posts';
        $this->_headerText = $this->__('Blog');

        parent::__construct();
    }
}
