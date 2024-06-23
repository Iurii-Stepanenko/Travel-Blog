<?php
/** @var $post \Iuriis\Blog\Model\Post\Entity */
?>
<section title="Recently added posts">
    <h2>Recently Added Posts</h2>
    <div class="post-list">
        <?php foreach (blogGetNewPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <p><?= substr($post->getDescription(), 0, 150) . '...' ?></p>
                <p><?= $post->getAuthorName() ?></p>
                <p><?= $post->getPublicationDate() ?></p>
                <a href="/<?= $post->getUrl() ?>">Read more</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
