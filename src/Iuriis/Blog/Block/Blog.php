<?php

declare(strict_types=1);

namespace Iuriis\Blog\Block;

use Iuriis\Blog\Model\Post\Entity as PostEntity;

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
    public function getPostsList()
    {
        return $this->postRepository->getList();
    }
}