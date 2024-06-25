<?php
/** @var $block \Iuriis\Blog\Block\Author */

$author = $block->getAuthor();
?>

<div class="author">
    <h1><?= $author->getAuthorName() ?></h1>
    <img src="/post-placeholder.png" alt="<?= $author->getAuthorName() ?>" width="300"/>

    <?php foreach ($block->getAuthorPosts($author->getAuthorId()) as $post) : ?>
        <div class="post">
            <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a>
            <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
            </a>
            <p><?= substr($post->getDescription(), 0, 150) . '...' ?></p>
            <p><?= $post->getPublicationDate() ?></p>
            <a href="/<?= $post->getUrl() ?>">Read more</a>
        </div>
    <?php endforeach; ?>
</div>