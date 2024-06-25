<?php

declare(strict_types=1);

namespace Iuriis\Blog\Model\Author;

class Entity
{
    /**
     * @var int $authorId
     */
    private int $authorId;

    /**
     * @var string $authorName
     */
    private string $authorName;

    /**
     * @var array $authorPostIds
     */
    private array $authorPostIds;

    /**
     * @var string $url
     */
    private string $url;

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
     * @return array
     */
    public function getAuthorPostIds(): array
    {
        return $this->authorPostIds;
    }

    /**
     * @param array $authorPostIds
     * @return $this
     */
    public function setAuthorPostIds(array $authorPostIds): Entity
    {
        $this->authorPostIds = $authorPostIds;

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
}