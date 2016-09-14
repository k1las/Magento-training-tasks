<?php

/**
 * Class OnePica_Blog_Block_Adminhtml_Posts_Edit
 */
class OnePica_Blog_Block_Adminhtml_Posts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * OnePica_Blog_Block_Adminhtml_Posts_Edit constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'onepica_blog';
        $this->_controller = 'adminhtml_posts';
        $this->_mode = 'edit';
        $this->_addButton('save_and_continue', array(
                'label' => $this->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', $this->__('Save post info'));
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }";
    }

    /** Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('posts_data') && Mage::registry('posts_data')->getId()) {
            return $this->__('Edit News info "%s"', $this->htmlEscape(Mage::registry('posts_data')->getTitle()));
        } else {
            return $this->__('New News info');
        }
    }
}
