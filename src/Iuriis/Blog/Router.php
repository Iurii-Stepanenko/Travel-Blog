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
     * @var \Iuriis\Blog\Model\Post\Repository $postRepository
     */
    private \Iuriis\Blog\Model\Post\Repository $postRepository;

    /**
     * @var \Iuriis\Blog\Model\Author\Repository $authorRepository
     */
    private Model\Author\Repository $authorRepository;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     * @param \Iuriis\Blog\Model\Category\Repository $categoryRepository
     * @param \Iuriis\Blog\Model\Post\Repository $postRepository
     * @param \Iuriis\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request,
        \Iuriis\Blog\Model\Category\Repository $categoryRepository,
        \Iuriis\Blog\Model\Post\Repository $postRepository,
        \Iuriis\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return \Iuriis\Blog\Controller\Category::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post', $post);
            return \Iuriis\Blog\Controller\Post::class;
        }

        if ($author = $this->authorRepository->getAuthorByUrl($requestUrl)) {
            $this->request->setParameter('author', $author);
            return \Iuriis\Blog\Controller\Author::class;
        }

        if ($requestUrl === 'blog') {
            return \Iuriis\Blog\Controller\Blog::class;
        }

        return '';
    }
}