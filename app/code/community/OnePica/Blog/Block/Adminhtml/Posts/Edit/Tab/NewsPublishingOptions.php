<?php

/**
 * Class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tab_NewsPublishingOptions
 */
class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tab_NewsPublishingOptions extends Mage_Adminhtml_Block_Widget_Form
        implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Prepare content for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('Publishing Options');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('Publishing Options');
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
                'legend' => $this->__('Publishing Options')
        ));

        $fieldset->addField('start_publishing', 'date', array(
                'name' => 'start_publishing',
                'after_element_html' => '<button onclick="resetFieldValue(' . "start_publishing" . ')">Clear</button>',
                'label' => $this->__('Start publishing on'),
                'title' => $this->__('Start publishing on'),
                'required' => false,
                'image' => $this->getSkinUrl('images/grid-cal.gif'),
                'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT)
        ));

        $fieldset->addField('end_publishing', 'date', array(
                'name' => 'end_publishing',
                'after_element_html' => '<button onclick="resetFieldValue(' . "end_publishing" . ')">Clear</button>',
                'label' => $this->__('End publishing on'),
                'title' => $this->__('End publishing on'),
                'required' => false,
                'image' => $this->getSkinUrl('images/grid-cal.gif'),
                'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT)
        ));

        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
