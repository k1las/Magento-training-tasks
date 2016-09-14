<?php

/**
 * Class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tab_NewsSeoOptions
 */
class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tab_NewsSeoOptions extends Mage_Adminhtml_Block_Widget_Form
        implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Prepare content for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('Seo Options');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('Seo Options');
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
        $data = Mage::registry('posts_data');
        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('news_publishing', array(
                'legend' => $this->__('Seo Options')
        ));
        $fieldset->addField('page_title', 'text', array(
                'name' => 'page_title',
                'label' => $this->__('Page title'),
                'title' => $this->__('Page title'),
                'required' => false,
        ));
        $fieldset->addField('keywords', 'textarea', array(
                'name' => 'keywords',
                'label' => $this->__('Keywords'),
                'title' => $this->__('Keywords'),
                'required' => false,
        ));
        $fieldset->addField('description', 'textarea', array(
                'name' => 'description',
                'label' => $this->__('Description'),
                'title' => $this->__('Description'),
                'required' => false,
        ));
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
