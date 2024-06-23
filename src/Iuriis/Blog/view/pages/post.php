<?php
/** @var $block \Iuriis\Blog\Block\Post  */
$post = $block->getPost();
?>

<div class="post">
    <h1><?= $post->getName() ?></h1>
    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
    <p><?= $post->getDescription() ?></p>
    <p><?= $post->getAuthorName() ?></p>
    <p><?= $post->getPublicationDate() ?></p>
</div>