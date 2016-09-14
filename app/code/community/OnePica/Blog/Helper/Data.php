<?php

/**
 * Class OnePica_Blog_Helper_Data
 */
class OnePica_Blog_Helper_Data extends Mage_Core_Helper_Abstract
{
    /** Get blog config field value by field name
     *
     * @param string $field
     * @return mixed
     */
    public function getBlogConfigFieldValue($field)
    {
        return Mage::getStoreConfig('blog_options/messages/' . $field);
    }

    /** Get color part
     * @return string
     */
    public function randomColorPart()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    /**get Random color
     * @return string
     */
    public function getRandomColor()
    {
        return $this->randomColorPart() . $this->randomColorPart() . $this->randomColorPart();
    }

    /**Transform text
     * @param string $text
     * @return string
     */
    public function getTransformedText($text)
    {
        $transformed = '';
        $cases = array('strtolower', 'strtoupper');

        for ($i = 0; $i <= strlen($text); $i++) {
            $transformed .= $cases[rand(0, 1)]($text[$i]);
        }

        return $transformed;
    }
}
