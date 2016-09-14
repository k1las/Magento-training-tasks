<?php
$this->createEntityTables(
        $this->getTable('onepica_blog/post_entity')
);

/*
 * Add Entity type
 */
$this->addEntityType('onepica_blog_post', Array(
        'entity_model' => 'onepica_blog/post',
        'attribute_model' => '',
        'table' => 'onepica_blog/post_entity',
        'increment_model' => '',
        'increment_per_store' => '0'
));

$this->installEntities();
