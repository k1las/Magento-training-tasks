<?php

/**
 * Class MyNamespace_Test_Block_Adminhtml_Additional_Grid
 */
class MyNamespace_Test_Block_Adminhtml_Additional_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * MyNamespace_Test_Block_Adminhtml_Additional_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('additional_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    /** Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $this->setCollection(Mage::getModel('test/additional')->getCollection());
        return parent::_prepareCollection();
    }

    /** Prepare columns
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
                'header' => Mage::helper('mynamespace_test')->__('ID'),
                'align' => 'right',
                'width' => '50px',
                'index' => 'id',
        ));
        $this->addColumn('name', array(
                'header' => Mage::helper('mynamespace_test')->__('Name'),
                'align' => 'left',
                'index' => 'name',
        ));
        $this->addColumn('description', array(
                'header' => Mage::helper('mynamespace_test')->__('Description'),
                'align' => 'left',
                'index' => 'description',
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

    /** Prepare layout
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
        if ($this->_blockGroup && $this->_controller && $this->_mode) {
            $this->setChild('form',
                    $this->getLayout()
                            ->createBlock(
                                    $this->_blockGroup . '/' . $this->_controller . '_' . $this->_mode . '_form')
            );
        }
        return parent::_prepareLayout();
    }
}
