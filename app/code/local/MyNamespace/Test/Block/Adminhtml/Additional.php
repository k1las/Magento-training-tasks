<?php

/**
 * Class MyNamespace_Test_Block_Adminhtml_Additional
 */
class MyNamespace_Test_Block_Adminhtml_Additional extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /** Button label
     * @var string
     */
    protected $_addButtonLabel = 'Add New Additional info';

    /**
     * MyNamespace_Test_Block_Adminhtml_Additional constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_controller = 'adminhtml_additional';
        $this->_blockGroup = 'mynamespace_test';
        $this->_headerText = Mage::helper('mynamespace_test')->__('Examples');
    }

    /** Prepare layout
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
        $this->setChild('grid',
                $this->getLayout()->createBlock($this->_blockGroup . '/' . $this->_controller . '_grid',
                        $this->_controller . '.grid')->setSaveParametersInSession(true));
        return parent::_prepareLayout();
    }
}
