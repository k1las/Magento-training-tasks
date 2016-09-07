<?php

/**
 * Class OnePica_News_Block_News_View
 */
class OnePica_News_Block_News_View extends Mage_Core_Block_Template
{
    /** Current post model
     * @var OnePica_News_Model_News
     */
    public $post;

    /**
     * Get news post
     */
    public function getNewsPost()
    {
        if (empty($this->post->getData())) {
            Mage::app()->getResponse()->setRedirect(Mage::getUrl(404));
        }

        return $this->post;
    }
}
