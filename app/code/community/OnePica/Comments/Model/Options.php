<?php

/**
 * Class OnePica_Comments_Model_Options
 */
class OnePica_Comments_Model_Options
{
    /**Get authors array
     *
     * @return array
     */
    public static function getAuthorsOptions()
    {
        $options = array();
        $options[] = 'No author';
        foreach (Mage::getModel('customer/customer')->getCollection()->addAttributeToSelect('*') as $author) {
            $options[$author->getId()] = $author->getName();
        }
        return $options;
    }

    /**Get authors array
     *
     * @return array
     */
    public static function getPostsOptions()
    {
        $options = array();
        foreach (Mage::getModel('onepica_blog/post')->getCollection()->addAttributeToSelect('*') as $post) {
            $options[$post->getId()] = $post->getId() . ':' . $post->getTitle();
        }
        return $options;
    }

    /**Get statuses array
     *
     * @return array
     */
    public static function getStatusOptions()
    {
        return array(1 => 'Approved', 0 => 'Not confirmed');
    }

    /**System config options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
                array('value' => 0, 'label' => Mage::helper('onepica_blog')->__('No')),
                array('value' => 1, 'label' => Mage::helper('onepica_blog')->__('Yes')),
        );
    }
}
