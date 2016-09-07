<?php
$table = $this->getConnection()
        ->newTable($this->getTable('onepica_news/news'))
        ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
        ), 'Id')
        ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'nullable' => false
        ), 'Title')
        ->addColumn('published', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
                'default' => false,
                'nullable' => true
        ), 'Published')
        ->addColumn('intro', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
                'nullable' => false
        ), 'Intro')
        ->addColumn('post_content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
                'nullable' => false
        ), 'Content')
        ->addColumn('start_publishing', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
                'nullable' => false
        ), 'Start publishing')
        ->addColumn('end_publishing', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
                'nullable' => false
        ), 'End publishing')
        ->addColumn('page_title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'nullable' => true
        ), 'Page Title')
        ->addColumn('keywords', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'nullable' => true
        ), 'Keywords')
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'nullable' => true
        ), 'Description')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
                'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
                'nullable' => false
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
                'nullable' => true
        ), 'Updated At');

$this->getConnection()->createTable($table);
