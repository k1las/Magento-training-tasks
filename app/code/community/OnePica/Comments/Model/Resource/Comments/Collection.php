<?php

/**
 * Class OnePica_Comments_Model_Resource_Comments_Collection
 */
class OnePica_Comments_Model_Resource_Comments_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Init
     */
    protected function _construct()
    {
        $this->_init('comments/comments');
    }

    /**Get comments by post id
     *
     * @param int $postId
     * @param int $limit
     * @param int $page
     * @return OnePica_Comments_Model_Resource_Comments_Collection
     */
    public function getComments($postId, $limit, $page)
    {
        return $this->addFieldToFilter('post_id', $postId)
                ->addFieldToFilter('status', 1)
                ->addFieldToFilter('del_flg', 0)
                ->setCurPage($page)
                ->setPageSize($limit);
    }

    /**Get comments by ids
     *
     * @param array $ids
     * @return OnePica_Comments_Model_Resource_Comments_Collection
     */
    public function filterByIds($ids)
    {
        return $this->addFieldToFilter('id', array('in' => $ids));
    }
}
