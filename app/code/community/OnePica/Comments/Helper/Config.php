<?php

/**
 * Class OnePica_Comments_Helper_Config
 */
class OnePica_Comments_Helper_Config extends OnePica_Comments_Helper_Abstract
{
    /**Get value from config
     *
     * @param string $field
     * @return mixed
     */
    private function _getValue($field)
    {
        return Mage::getStoreConfig('comments_options/messages/' . $field);
    }

    /**Get comments auto approve config value
     *
     * @return mixed
     */
    public function autoApprove()
    {
        return $this->_getValue('auto_approve');
    }

    /**Get comments enable config value
     *
     * @return mixed
     */
    public function enableComments()
    {
        return $this->_getValue('enable_comments');
    }

    /**Get comments login required config value
     *
     * @return mixed
     */
    public function loginRequired()
    {
        return $this->_getValue('login_required');
    }

    /**Get comments per page config value
     *
     * @return mixed
     */
    public function commentsPerPage()
    {
        return $this->_getValue('comments_per_page');
    }
}
