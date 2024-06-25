<?php

declare(strict_types=1);

namespace Iuriis\Blog\Block;

use Iuriis\Blog\Model\Category\Entity as CategoryEntity;
use Iuriis\Blog\Model\Post\Entity as PostEntity;

class Category extends \Iuriis\Framework\View\Block
{
    protected string $template = '../src/Iuriis/Blog/view/pages/category.php';

    /**
     * @var \Iuriis\Framework\Http\Request $request
     */
    private \Iuriis\Framework\Http\Request $request;

    /**
     * @var \Iuriis\Blog\Model\Post\Repository $postRepository
     */
    private \Iuriis\Blog\Model\Post\Repository $postRepository;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     * @param \Iuriis\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request,
        \Iuriis\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
    }

    /**
     * @return CategoryEntity
     */
    public function getCategory(): CategoryEntity
    {
        return $this->request->getParameter('category');
    }

    /**
     * @return PostEntity[]
     */
    public function getCategoryPosts(): array
    {
         return $this->postRepository->getByIds($this->getCategory()->getPosts());
    }

    /**
     * @param int $postId
     * @return string|null
     */
    public function prepareAuthorUrl(int $postId): ?string
    {
        $categoryPosts = $this->getCategoryPosts();

        foreach ($categoryPosts as $post) {
            if ($post->getPostId() === $postId) {
                return str_replace(' ', '-', strtolower($post->getAuthorName()));
            }
        }

        return null;
    }
}