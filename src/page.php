<?php
/** @var $this \Iuriis\Framework\View\Renderer */
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
            <li><a href="/blog">Blog</a></li>
            <?= $this->render(\Iuriis\Blog\Block\CategoryList::class) ?>
        </ul>
    </nav>
</header>

<main>
    <?= $this->render($this->getContent(), $this->getContentBlockTemplate()) ?>
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
