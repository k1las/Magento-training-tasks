<?php
/**
 * OnePica
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to codemaster@onepica.com so we can send you a copy immediately.
 *
 * @category    OnePica
 * @package     OnePica_LifestyleGallery
 * @copyright   Copyright (c) 2012 One Pica, Inc. (http://www.onepica.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Class OnePica_Comments_Block_Adminhtml_Comments_Edit_Form
 */
class OnePica_Comments_Block_Adminhtml_Comments_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Edit gallery form constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('comment_form');
        $this->setTitle($this->__('Comment'));
    }

    /**
     * Prepare form
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $data = Mage::registry('comment_data');
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
        ));

        $fieldset = $form->addFieldset('comment', array(
                'legend' => $this->__('Comment Information')
        ));

        $wysiwgEditorConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();

        $fieldset->addField('customer_id', 'select', array(
                'name' => 'customer_id',
                'label' => $this->__('Author'),
                'title' => $this->__('Author'),
                'values' => OnePica_Comments_Model_Options::getAuthorsOptions(),
                'required' => true
        ));
        $fieldset->addField('post_id', 'select', array(
                'name' => 'post_id',
                'label' => $this->__('Post'),
                'title' => $this->__('Post'),
                'values' => OnePica_Comments_Model_Options::getPostsOptions(),
                'required' => true
        ));
        $fieldset->addField('status', 'select', array(
                'name' => 'status',
                'label' => $this->__('Status'),
                'title' => $this->__('Status'),
                'values' => OnePica_Comments_Model_Options::getStatusOptions(),
                'required' => true
        ));
        $fieldset->addField('text', 'editor', array(
                'name' => 'text',
                'label' => $this->__('Text'),
                'title' => $this->__('Text'),
                'config' => $wysiwgEditorConfig,
                'wysiwyg' => true,
                'required' => true
        ));
        $form->setUseContainer(true);
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
