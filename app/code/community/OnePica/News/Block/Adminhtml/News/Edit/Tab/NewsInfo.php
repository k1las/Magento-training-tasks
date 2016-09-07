<?php

/**
 * Class OnePica_News_Block_Adminhtml_News_Edit_Tab_NewsInfo
 */
class OnePica_News_Block_Adminhtml_News_Edit_Tab_NewsInfo extends Mage_Adminhtml_Block_Widget_Form
        implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Prepare content for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('News Information');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('News Information');
    }

    /**
     * Returns status flag about this tab can be showed or not
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /** Prepare form
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $data = Mage::registry('news_data');

        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('news_info', array(
                'legend' => Mage::helper('onepica_news')->__('News Information')
        ));

        $fieldset->addField('title', 'text', array(
                'name' => 'title',
                'label' => Mage::helper('onepica_news')->__('Title'),
                'title' => Mage::helper('onepica_news')->__('Title'),
                'required' => true,
        ));

        $fieldset->addField('published', 'select', array(
                'label' => Mage::helper('onepica_news')->__('Published?'),
                'required' => false,
                'name' => 'published',
                'value' => '1',
                'values' => array('0' => 'No', '1' => 'Yes'),
                'disabled' => false,
                'readonly' => false,
        ));

        $wysiwgEditorConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();

        $fieldset->addField('intro', 'editor', array(
                'name' => 'intro',
                'label' => Mage::helper('onepica_news')->__('Intro'),
                'title' => Mage::helper('onepica_news')->__('Intro'),
                'config' => $wysiwgEditorConfig,
                'wysiwyg' => true,
                'required' => true
        ));

        $fieldset->addField('post_content', 'editor', array(
                'name' => 'post_content',
                'label' => Mage::helper('onepica_news')->__('Content'),
                'title' => Mage::helper('onepica_news')->__('Content'),
                'config' => $wysiwgEditorConfig,
                'wysiwyg' => true,
                'required' => true
        ));

        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
