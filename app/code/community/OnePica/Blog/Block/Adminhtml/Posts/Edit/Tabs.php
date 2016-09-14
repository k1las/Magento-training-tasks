<?php

/**
 * Class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tabs
 */
class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * OnePica_Blog_Block_Adminhtml_Posts_Edit_Tabs constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('onepica_blog_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('News Information'));
    }
}
