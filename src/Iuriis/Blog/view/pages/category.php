<?php
/** @var $block \Iuriis\Blog\Block\Category */

?>
<section title="Categories">
    <h1><?= $block->getCategory()->getName()?></h1>
    <?php foreach ($block->getCategoryPosts() as $post) : ?>
        <div class="post">
            <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a>
            <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
            </a>
            <p><?= substr($post->getDescription(), 0, 150) . '...' ?></p>
            <a href="/<?= $block->prepareAuthorUrl($post->getPostId())?>"><?= $post->getAuthorName() ?></a>
            <p><?= $post->getPublicationDate() ?></p>
            <a href="/<?= $post->getUrl() ?>">Read more</a>
        </div>
    <?php endforeach; ?>
</section>
