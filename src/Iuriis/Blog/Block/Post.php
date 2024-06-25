<?php

declare(strict_types=1);

namespace Iuriis\Blog\Block;

use Iuriis\Blog\Model\Post\Entity as PostEntity;
use Iuriis\Blog\Model\Author\Entity as AuthorEntity;

class Post extends \Iuriis\Framework\View\Block
{
    protected string $template = '../src/Iuriis/Blog/view/pages/post.php';

    /**
     * @var \Iuriis\Framework\Http\Request $request
     */
    private \Iuriis\Framework\Http\Request $request;

    /**
     * @var \Iuriis\Blog\Model\Author\Repository $authorRepository
     */
    private \Iuriis\Blog\Model\Author\Repository $authorRepository;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request,
        \Iuriis\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }

    /**
     * @param int $postId
     * @return string|null
     */
    public function prepareAuthorUrl(int $postId): ?string
    {
        $post = $this->getPost();

        if ($post->getPostId() === $postId) {
            return str_replace(' ', '-', strtolower($post->getAuthorName()));
        }

        return null;
    }
}