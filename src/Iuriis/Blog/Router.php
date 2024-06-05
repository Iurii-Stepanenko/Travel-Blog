<?php

declare(strict_types=1);

namespace Iuriis\Blog;

class Router implements \Iuriis\Framework\Http\RouterInterface
{
    /**
     * @var \Iuriis\Framework\Http\Request $request
     */
    private \Iuriis\Framework\Http\Request $request;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = catalogGetCategoryByUrl($requestUrl)) {
            $this->request->setParameter('category', $data);
            return \Iuriis\Blog\Controller\Category::class;
        }

        if ($data = catalogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return \Iuriis\Blog\Controller\Post::class;
        }

        return '';
    }
}