<?php

/**
 * Class OnePica_Comments_Block_Adminhtml_Comments
 */
class OnePica_Comments_Block_Adminhtml_Comments extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * OnePica_Blog_Block_Adminhtml_Posts constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'comments';
        $this->_controller = 'adminhtml_comments';
        $this->_headerText = $this->__('Comments');
        $this->_removeButton('add');
    }
}
