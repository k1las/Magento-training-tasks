<?php
$table = $this->getConnection()
        ->newTable($this->getTable('onepica_blog/post_entity_tag_relation'))
        ->addColumn('tag_relation_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
        ), 'Tag Relation Id')
        ->addColumn('tag_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
        ), 'Tag Id')
        ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
        ), 'Post Id')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(), 'Created At')
        ->addIndex($this->getIdxName('onepica_blog/post_entity_tag_relation', array('tag_id', 'post_id'), Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
                array('tag_id', 'post_id'), array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE))
        ->addIndex($this->getIdxName('onepica_blog/post_entity_tag_relation', array('post_id')),
                array('post_id'))
        ->addIndex($this->getIdxName('onepica_blog/post_entity_tag_relation', array('tag_id')),
                array('tag_id'))
        ->addForeignKey($this->getFkName('onepica_blog/post_entity_tag_relation', 'post_id', 'onepica_blog/post_entity', 'entity_id'),
                'post_id', $this->getTable('onepica_blog/post_entity'), 'entity_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey($this->getFkName('onepica_blog/post_entity_tag_relation', 'tag_id', 'tag/tag', 'tag_id'),
                'tag_id', $this->getTable('tag/tag'), 'tag_id',
                Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->setComment('Tag Relation');
$this->getConnection()->createTable($table);
