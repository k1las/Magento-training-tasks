<?php

/**
 * Class OnePica_Blog_Model_Container_Posts_Latest
 */
class OnePica_Blog_Model_Container_Posts_Latest extends Enterprise_PageCache_Model_Container_Abstract
{
    /** Get cache id
     * @return string
     */
    protected function _getCacheId()
    {
        return 'OnePica_Blog_Posts_Latest' . $this->_getIdentifier();
    }

    /**Cache ident
     * @return mixed
     */
    protected function _getIdentifier()
    {
        return microtime();
    }

    /**Render block
     * @return mixed
     */
    protected function _renderBlock()
    {
        $blockClass = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');
        $block = new $blockClass;
        $block->setTemplate($template);
        $layout = Mage::app()->getLayout();
        $block->setLayout($layout);
        return $block->toHtml();
    }

    /**Cache settings
     * @param string $data
     * @param string $id
     * @param array  $tags
     * @param int $lifetime
     * @return bool
     */
    protected function _saveCache($data, $id, $tags = array(), $lifetime = null)
    {
        return false;
    }
}
