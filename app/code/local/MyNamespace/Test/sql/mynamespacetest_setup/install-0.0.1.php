<?php
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
