<?php
$this->getConnection()->insert($this->getTable('test/additional'), array(
        'name' => 'First item',
        'description' => 'First item description'
));
