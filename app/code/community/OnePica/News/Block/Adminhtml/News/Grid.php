<?php

/**
 * Class OnePica_News_Block_Adminhtml_News_Grid
 */
class OnePica_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * OnePica_News_Block_Adminhtml_News_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('onepica_news_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    /** Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $this->setCollection(Mage::getModel('onepica_news/news')->getCollection());
        return parent::_prepareCollection();
    }

    /**Prepare table clumns
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('id',
                array(
                        'header' => Mage::helper('onepica_news')->__('ID'),
                        'align' => 'right',
                        'width' => '50px',
                        'index' => 'id'
                )
        );
        $this->addColumn('title',
                array(
                        'header' => Mage::helper('onepica_news')->__('Title'),
                        'index' => 'title'
                ));
        $this->addColumn('intro',
                array(
                        'header' => Mage::helper('onepica_news')->__('Intro'),
                        'index' => 'intro'
                ));
        $this->addColumn('published',
                array(
                        'header' => Mage::helper('onepica_news')->__('Published'),
                        'index' => 'published'
                ));

        return parent::_prepareColumns();
    }

    /** Get row url
     *
     * @param string $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
