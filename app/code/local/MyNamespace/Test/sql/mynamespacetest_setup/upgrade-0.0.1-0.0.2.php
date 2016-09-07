<?php
$table = $this->getConnection()
        ->newTable($this->getTable('test/additional'))
        ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'length' => 11,
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
        ), 'Id')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'length' => 200,
                'nullable' => false
        ), 'Name')
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'length' => 100,
                'nullable' => false
        ), 'Description');

$this->getConnection()->createTable($table);
