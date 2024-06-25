<?php

declare(strict_types=1);

namespace Iuriis\Blog\Block;

use Iuriis\Blog\Model\Author\Entity as AuthorEntity;
use Iuriis\Blog\Model\Post\Entity as PostEntity;

class Author extends \Iuriis\Framework\View\Block
{
    protected string $template = '../src/Iuriis/Blog/view/pages/author.php';

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
     * @return AuthorEntity
     */
    public function getAuthor(): AuthorEntity
    {
        return $this->request->getParameter('author');
    }

    /**
     * @param int $authorId
     * @return PostEntity[]|null
     */
    public function getAuthorPosts(int $authorId): ?array
    {
        return $this->postRepository->getByAuthorId($authorId);
    }
}