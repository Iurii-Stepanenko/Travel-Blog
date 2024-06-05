<?php

declare(strict_types=1);

namespace Iuriis\Blog;

class Router implements \Iuriis\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = catalogGetCategoryByUrl($requestUrl)) {
            return \Iuriis\Blog\Controller\Category::class;
        }

        if ($data = catalogGetPostByUrl($requestUrl)) {
            return \Iuriis\Blog\Controller\Post::class;
        }

        return '';
    }
}