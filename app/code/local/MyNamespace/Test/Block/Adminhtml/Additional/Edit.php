<?php

/**
 * Class MyNamespace_Test_Block_Adminhtml_Additional_Edit
 */
class MyNamespace_Test_Block_Adminhtml_Additional_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * MyNamespace_Test_Block_Adminhtml_Additional_Edit constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'mynamespace_test';
        $this->_controller = 'adminhtml_additional';
        $this->_mode = 'edit';
        $this->_addButton('save_and_continue', array(
                'label' => Mage::helper('mynamespace_test')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', Mage::helper('mynamespace_test')->__('Save Additional info'));
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
        if (Mage::registry('additional_data') && Mage::registry('additional_data')->getId()) {
            return Mage::helper('mynamespace_test')->__('Edit Additional info "%s"', $this->htmlEscape(Mage::registry('additional_data')->getName()));
        } else {
            return Mage::helper('mynamespace_test')->__('New Additional info');
        }
    }
}
