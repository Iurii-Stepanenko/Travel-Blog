<?php

declare(strict_types=1);

namespace Iuriis\Blog\Model\Post;

class Entity
{
    /**
     * @var int
     */
    private int $postId;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var string
     */
    private string $authorName;

    /**
     * @var int
     */
    private int $authorId;

    /**
     * @var string
     */
    private string $publicationDate;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId(int $postId): Entity
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Entity
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Entity
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): Entity
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * @param string $authorName
     * @return $this
     */
    public function setAuthorName(string $authorName): Entity
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return $this
     */
    public function setAuthorId(int $authorId): Entity
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicationDate(): string
    {
        return $this->publicationDate;
    }

    /**
     * @param string $publicationDate
     * @return $this
     */
    public function setPublicationDate(string $publicationDate): Entity
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }
}

