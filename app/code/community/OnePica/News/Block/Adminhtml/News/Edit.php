<?php

/**
 * Class OnePica_News_Block_Adminhtml_News_Edit
 */
class OnePica_News_Block_Adminhtml_News_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * OnePica_News_Block_Adminhtml_News_Edit constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'onepica_news';
        $this->_controller = 'adminhtml_news';
        $this->_mode = 'edit';
        $this->_addButton('save_and_continue', array(
                'label' => Mage::helper('onepica_news')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', Mage::helper('onepica_news')->__('Save post info'));
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
        if (Mage::registry('news_data') && Mage::registry('news_data')->getId()) {
            return Mage::helper('onepica_news')->__('Edit News info "%s"', $this->htmlEscape(Mage::registry('news_data')->getTitle()));
        } else {
            return Mage::helper('onepica_news')->__('New News info');
        }
    }
}
