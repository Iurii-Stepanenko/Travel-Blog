<?php

declare(strict_types=1);

namespace Iuriis\Blog\Block;

class RecentlyAddPosts extends \Iuriis\Framework\View\Block
{
    protected string $template = '../src/Iuriis/Blog/view/recently-add-posts.php';

    private \Iuriis\Blog\Model\Post\Repository $postRepository;

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
    public function getRecentlyAddedPosts()
    {
        return $this->postRepository->blogGetNewPosts();
    }
}