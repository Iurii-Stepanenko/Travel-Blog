<section title="Recently added posts">
    <h2>Recently Added Posts</h2>
    <div class="post-list">
        <?php foreach (blogGetNewPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <p><?= substr($post['description'], 0, 150) . '...' ?></p>
                <p><?= $post['author_name'] ?></p>
                <p><?= $post['publication_date'] ?></p>
                <a href="/<?= $post['url'] ?>">Read more</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
