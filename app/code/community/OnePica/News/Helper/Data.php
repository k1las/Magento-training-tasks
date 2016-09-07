<?php

/**
 * Class OnePica_News_Helper_Data
 */
class OnePica_News_Helper_Data extends Mage_Core_Helper_Abstract
{
    /** Get news config field value by field name
     *
     * @param string $field
     * @return mixed
     */
    public function getNewsConfigFieldValue($field)
    {
        return Mage::getStoreConfig('news_options/messages/' . $field);
    }
}
