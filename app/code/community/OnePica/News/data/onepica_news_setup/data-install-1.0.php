<?php
for ($i = 0; $i <= 20; $i++) {
    $this->getConnection()->insert($this->getTable('onepica_news/news'), array(
            'title' => 'First post',
            'published' => true,
            'intro' => 'First post intro',
            'post_content' => 'First post content',
            'start_publishing' => date('Y/m/d H-i-s', time()),
            'end_publishing' => date('Y/m/d H-i-s', strtotime("+30 days")),
            'page_title' => 'First page title',
            'keywords' => 'First, page, title, post',
            'description' => 'First post description'
    ));
}
