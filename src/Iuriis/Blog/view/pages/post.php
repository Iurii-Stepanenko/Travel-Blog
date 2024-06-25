<?php
/** @var $block \Iuriis\Blog\Block\Post  */
$post = $block->getPost();
?>

<div class="post">
    <h1><?= $post->getName() ?></h1>
    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
    <p><?= $post->getDescription() ?></p>
    <a href="/<?= $block->prepareAuthorUrl($post->getPostId())?>"><?= $post->getAuthorName() ?></a>
    <p><?= $post->getPublicationDate() ?></p>
</div>