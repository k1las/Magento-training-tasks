<?php

/**
 * Class OnePica_Comments_Block_Adminhtml_Comments_Grid
 */
class OnePica_Comments_Block_Adminhtml_Comments_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('comments_grid');
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
        $this->setCollection(Mage::getModel('comments/comments')->getCollection()->addFieldToFilter('del_flg', 0));
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
                        'header' => $this->__('ID'),
                        'align' => 'right',
                        'width' => '50px',
                        'index' => 'id'
                )
        );

        $this->addColumn('post_id',
                array(
                        'header' => $this->__('Post'),
                        'index' => 'post_id',
                        'type' => 'options',
                        'options' => OnePica_Comments_Model_Options::getPostsOptions()
                ));

        $this->addColumn('customer_id',
                array(
                        'header' => $this->__('Author'),
                        'index' => 'customer_id',
                        'type' => 'options',
                        'options' => OnePica_Comments_Model_Options::getAuthorsOptions()
                ));

        $this->addColumn('name',
                array(
                        'header' => $this->__('Author name'),
                        'index' => 'name',
                ));

        $this->addColumn('text',
                array(
                        'header' => $this->__('Text'),
                        'index' => 'text',
                ));

        $this->addColumn('status',
                array(
                        'header' => $this->__('Status'),
                        'index' => 'status',
                        'type' => 'options',
                        'options' => OnePica_Comments_Model_Options::getStatusOptions()
                ));

        $this->addColumn('created_at',
                array(
                        'header' => $this->__('Created'),
                        'index' => 'created_at',
                        'type' => 'datetime'
                ));

        return parent::_prepareColumns();
    }

    /**Add massaction
     *
     * @return OnePica_Blog_Block_Adminhtml_PostsExport_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('ids');

        $this->getMassactionBlock()->addItem('delete', array(
                'label' => $this->__('Delete'),
                'url' => $this->getUrl('*/*/delete', array('ids' => $this->getData('ids'))),
                'confirm' => $this->__('Delete selected comments?')
        ));

        $this->getMassactionBlock()->addItem('approve', array(
                'label' => $this->__('Approve'),
                'url' => $this->getUrl('*/*/approve', array('ids' => $this->getData('ids'))),
        ));

        $this->getMassactionBlock()->addItem('reject', array(
                'label' => $this->__('Reject'),
                'url' => $this->getUrl('*/*/reject', array('ids' => $this->getData('ids'))),
        ));
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
