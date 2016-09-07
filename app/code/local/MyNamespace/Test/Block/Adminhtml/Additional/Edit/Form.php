<?php

/**
 * Class MyNamespace_Test_Block_Adminhtml_Additional_Edit_Form
 */
class MyNamespace_Test_Block_Adminhtml_Additional_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /** Prepare form
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        if (Mage::getSingleton('adminhtml/session')->getAdditionalData()) {
            $data = Mage::getSingleton('adminhtml/session')->getAdditionalData();
            Mage::getSingleton('adminhtml/session')->getAdditionalData(null);
        } elseif (Mage::registry('additional_data')) {
            $data = Mage::registry('additional_data')->getData();
        } else {
            $data = array();
        }
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data',
        ));
        $form->setUseContainer(true);
        $this->setForm($form);
        $fieldset = $form->addFieldset('additional_form', array(
                'legend' => Mage::helper('mynamespace_test')->__('Example Information')
        ));
        $fieldset->addField('name', 'text', array(
                'label' => Mage::helper('mynamespace_test')->__('Name'),
                'class' => 'required-entry',
                'required' => true,
                'name' => 'name',
                'note' => Mage::helper('mynamespace_test')->__('The name of the example.'),
        ));
        $fieldset->addField('description', 'text', array(
                'label' => Mage::helper('mynamespace_test')->__('Description'),
                'class' => 'required-entry',
                'required' => true,
                'name' => 'description',
        ));
        $form->setValues($data);

        return parent::_prepareForm();
    }
}
