<?php
/** @var $block \Iuriis\Blog\Block\CategoryList */
?>

<ul><span>Categories</span>
    <?php foreach ( $block->getCategories() as $category) : ?>
        <li>
            <a href="/<?= $category->getUrl() ?>"><?= $category->getName() ?></a>
        </li>
    <?php endforeach; ?>
</ul>