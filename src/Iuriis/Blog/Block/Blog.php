<?php

declare(strict_types=1);

namespace Iuriis\Blog\Block;

class Blog extends \Iuriis\Framework\View\Block
{
    protected string $template = '../src/Iuriis/Blog/view/pages/blog.php';

    /**
     * @param \Iuriis\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Iuriis\Blog\Model\Post\Repository $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    /**
     * @return \Iuriis\Blog\Model\Post\Entity[]
     */
    public function getPostsList(): array
    {
        return $this->postRepository->getList();
    }

    /**
     * @param int $postId
     * @return string|null
     */
    public function prepareAuthorUrl(int $postId): ?string
    {
        $postsList = $this->getPostsList();

        foreach ($postsList as $post) {
            if ($post->getPostId() === $postId) {
                return str_replace(' ', '-', strtolower($post->getAuthorName()));
            }
        }

        return null;
    }
}