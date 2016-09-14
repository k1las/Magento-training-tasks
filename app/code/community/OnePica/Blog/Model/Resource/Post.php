<?php

/**
 * Class OnePica_Blog_Model_Resource_Post
 */
class OnePica_Blog_Model_Resource_Post extends Mage_Eav_Model_Entity_Abstract
{
    /**
     * OnePica_Blog_Model_Resource_Post constructor.
     */
    public function __construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('onepica_blog_post');
        $this->setConnection(
                $resource->getConnection('blog_read'),
                $resource->getConnection('blog_write')
        );
    }
    /** Change default attributes
     * @return array
     */
    protected function _getDefaultAttributes()
    {
        return array(
                'entity_type_id',
                'attribute_set_id',
                'created_at',
                'updated_at',
                'increment_id',
                'store_id',
                'website_id'
        );
    }
}
