<?php

/**
 * Class OnePica_Comments_Block_Adminhtml_Comments_Edit
 */
class OnePica_Comments_Block_Adminhtml_Comments_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * OnePica_Comments_Block_Adminhtml_Comments_Edit constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'comments';
        $this->_controller = 'adminhtml_comments';
        $this->_mode = 'edit';
        $this->_addButton('save_and_continue', array(
                'label' => $this->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', $this->__('Save comment info'));
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
        if (Mage::registry('comment_data') && Mage::registry('comment_data')->getId()) {
            return $this->__('Edit comment "%s"', $this->htmlEscape(Mage::registry('comment_data')->getId()));
        } else {
            return $this->__('New comment');
        }
    }
}
