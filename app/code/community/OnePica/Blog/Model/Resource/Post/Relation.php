<?php

/**
 * Class OnePica_Blog_Model_Resource_Post_Relation
 */
class OnePica_Blog_Model_Resource_Post_Relation extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Initialize resource connection and define table resource
     */
    protected function _construct()
    {
        $this->_init('onepica_blog/relation', 'tag_relation_id');
    }

    /**
     * Retrieve Tagged Posts
     *
     * @param OnePica_Blog_Model_Post_Relation $model
     * @return array
     */
    public function getPostIds($model)
    {
        $bind = array(
                'tag_id' => $model->getTagId()
        );
        $select = $this->_getReadAdapter()->select()
                ->from($this->getMainTable(), 'post_id')
                ->where($this->getMainTable() . '.tag_id=:tag_id');

        return $this->_getReadAdapter()->fetchCol($select, $bind);
    }

    /**
     * Retrieve Post tags
     *
     * @param OnePica_Blog_Model_Post_Relation $model
     * @return array
     */
    public function getTagIds($model)
    {
        $bind = array(
                'post_id' => $model->getPostId()
        );
        $select = $this->_getReadAdapter()->select()
                ->from($this->getMainTable(), 'tag_id')
                ->where($this->getMainTable() . '.post_id=:post_id');

        return $this->_getReadAdapter()->fetchCol($select, $bind);
    }
}
