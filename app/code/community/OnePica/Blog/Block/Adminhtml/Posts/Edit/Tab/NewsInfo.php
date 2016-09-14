<?php

/**
 * Class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tab_NewsInfo
 */
class OnePica_Blog_Block_Adminhtml_Posts_Edit_Tab_NewsInfo extends Mage_Adminhtml_Block_Widget_Form
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
        $data = Mage::registry('posts_data');

        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('news_info', array(
                'legend' => $this->__('News Information')
        ));

        $fieldset->addField('title', 'text', array(
                'name' => 'title',
                'label' => $this->__('Title'),
                'title' => $this->__('Title'),
                'required' => true,
        ));

        $fieldset->addField('published', 'select', array(
                'label' => $this->__('Published?'),
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
                'label' => $this->__('Intro'),
                'title' => $this->__('Intro'),
                'config' => $wysiwgEditorConfig,
                'wysiwyg' => true,
                'required' => true
        ));

        $fieldset->addField('post_content', 'editor', array(
                'name' => 'post_content',
                'label' => $this->__('Content'),
                'title' => $this->__('Content'),
                'config' => $wysiwgEditorConfig,
                'wysiwyg' => true,
                'required' => true
        ));

        $fieldset->addField('tags', 'text', array(
                'name' => 'tags',
                'label' => $this->__('Tags'),
                'title' => $this->__('Tags'),
                'required' => false,
        ));

        $tags = Mage::registry('post_tags');

        if (isset($tags)) {
            $tagsString = '';

            foreach ($tags as $tag) {
                $tagsString .= $tag->getName() . ',';
            }

            $tagsString = substr($tagsString, 0, strlen($tagsString) - 1);
            $data['tags'] = $tagsString;
        }
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
