<?php

/**
 * Class OnePica_Blog_Block_Adminhtml_Posts_Grid
 */
class OnePica_Blog_Block_Adminhtml_Posts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * OnePica_News_Block_Adminhtml_News_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('onepica_blog_grid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    /** Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $this->setCollection(Mage::getModel('onepica_blog/post')->getCollection()->addAttributeToSelect('*'));
        return parent::_prepareCollection();
    }

    /**Prepare table clumns
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id',
                array(
                        'header' => $this->__('ID'),
                        'align' => 'right',
                        'width' => '50px',
                        'index' => 'entity_id'
                )
        );
        $this->addColumn('title',
                array(
                        'header' => $this->__('Title'),
                        'index' => 'title'
                ));
        $this->addColumn('intro',
                array(
                        'header' => $this->__('Intro'),
                        'index' => 'intro'
                ));
        $this->addColumn('published',
                array(
                        'header' => $this->__('Published'),
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
