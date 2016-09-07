<?php
$table = $this->getConnection()
        ->newTable($this->getTable('test/test'))
        ->addColumn('tracking_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
        ), 'Id')
        ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'nullable' => false
        ), 'Customer Id')
        ->addColumn('action', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'nullable' => false
        ), 'Action')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
                'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
                'nullable' => false
        ), 'Created At');

$this->getConnection()->createTable($table);

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$entityTypeId = Mage_Catalog_Model_Product::ENTITY;
$options = array(
        'group' => 'General Information',
        'type' => 'varchar',
        'visible' => true
);
$setup->addAttribute($entityTypeId, 'extra_description_title', $options);
$setup->addAttribute($entityTypeId, 'extra_description', $options);
$setup->endSetup();
