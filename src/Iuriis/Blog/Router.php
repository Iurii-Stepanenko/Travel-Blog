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
     * @param \Iuriis\Framework\Http\Request $request
     * @param Model\Category\Repository $categoryRepository
     * @param \Iuriis\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request,
        \Iuriis\Blog\Model\Category\Repository $categoryRepository,
        \Iuriis\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
//        require_once '../src/data.php';

        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return \Iuriis\Blog\Controller\Category::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post', $post);
            return \Iuriis\Blog\Controller\Post::class;
        }

        if ($allPosts = $this->postRepository->getList()) {
            $this->request->setParameter('blog', $allPosts);
            return \Iuriis\Blog\Controller\Blog::class;
        }

//        if ($newestPosts = $this->postRepository->blogGetNewPosts()) {
//            $this->request->setParameter('posts-list', $newestPosts);
//            return \Iuriis\Blog\Controller\PostsList::class;
//        }

        return '';
    }
}