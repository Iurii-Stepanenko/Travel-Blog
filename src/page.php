<?php

require_once '../src/data.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Blog</title>
    <style>
        header,
        main,
        footer {
            border: 1px dashed black;
        }

        .post-list {
            display: flex;
        }

        .post-list .post {
            max-width: 30%;
        }
    </style>
</head>
<body>
<header>
    <a href="/" title="Travel Blog">
        <img src="/logo.png" alt="Logo" width="200"/>
    </a>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/posts-list">Blog</a></li>
            <ul><span>Categories</span>
                <?php foreach (catalogGetCategory() as $category) : ?>
                    <li>
                        <a href="/<?= $category['url'] ?>"><?= $category['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </ul>
    </nav>
</header>

<main>
    <?php require_once "../src/pages/$page" ?>
</main>

<footer>
    <nav>
        <ul>
            <li>
                <a href="/contact-us">Contact Us</a>
            </li>
        </ul>
    </nav>
    <p>© Iurii Stepanenko <?= date("Y"); ?>. All Rights Reserved.</p>
</footer>
</body>
</html>
