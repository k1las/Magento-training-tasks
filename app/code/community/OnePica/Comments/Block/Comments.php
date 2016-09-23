<?php

/**
 * Class OnePica_Comments_Block_Comments
 */
class OnePica_Comments_Block_Comments extends Mage_Core_Block_Template
{
    /**Get post comments
     *
     * @return OnePica_Comments_Model_Resource_Comments_Collection
     */
    public function getComments()
    {
        $page = $this->getRequest()->get('p');

        if (empty($page)) {
            $page = 1;
        }

        return Mage::getModel('comments/comments')
                ->getCollection()
                ->getComments($this->getRequest()->get('id'),
                        $this->helper('comments/config')->commentsPerPage(),
                        $page);
    }

    /**To html
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->helper('comments/config')->enableComments()) {
            return '';
        }

        return parent::_toHtml();
    }
}
