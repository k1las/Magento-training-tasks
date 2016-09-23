<?php
$table = $this->getConnection()
        ->newTable($this->getTable('comments/comments'))
        ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
        ), 'Id')
        ->addColumn('text', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
                'nullable' => false
        ), 'Text')
        ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'unsigned' => true,
                'nullable' => false,
        ), 'Post Id')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'default' => '',
                'nullable' => true
        ), 'Name')
        ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'unsigned' => true,
                'nullable' => true,
        ), 'Customer id')
        ->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'default' => 0,
                'nullable' => true
        ), 'Status')
        ->addColumn('del_flg', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'default' => 0,
                'nullable' => true
        ), 'Status')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
                'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
                'nullable' => false
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null,
                array(
                        'nullable' => true
                ), 'Updated At')
        ->addForeignKey($this->getFkName('comments/comments', 'post_id', 'onepica_blog/post_entity', 'entity_id'),
                'post_id', $this->getTable('onepica_blog/post_entity'), 'entity_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
$this->getConnection()->createTable($table);
