<?php
for ($i = 0; $i <= 20; $i++) {
    $post = Mage::getModel('onepica_blog/post');
    $post->setTitle('First post')
            ->setPublished(true)
            ->setIntro('First post intro')
            ->setPostContent('First post content')
            ->setStartPublishing(0)
            ->setEndPublishing(0)
            ->setPageTitle('First page title')
            ->setKeywords('First, page, title, post')
            ->setDescription('First post description');
    $post->save();
}
