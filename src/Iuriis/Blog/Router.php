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
     * @var \Iuriis\Blog\Model\Category\Repository $categoryRepository
     */
    private \Iuriis\Blog\Model\Category\Repository $categoryRepository;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     * @param \Iuriis\Blog\Model\Category\Repository $categoryRepository
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request,
        \Iuriis\Blog\Model\Category\Repository $categoryRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return \Iuriis\Blog\Controller\Category::class;
        }

        if ($data = catalogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return \Iuriis\Blog\Controller\Post::class;
        }

        if ($data = catalogGetPost()) {
            $this->request->setParameter('posts-list', $data);
            return \Iuriis\Blog\Controller\PostsList::class;
        }

        return '';
    }
}