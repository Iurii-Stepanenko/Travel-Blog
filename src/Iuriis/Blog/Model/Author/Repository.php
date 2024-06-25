<?php

declare(strict_types=1);

namespace Iuriis\Blog\Model\Author;

class Repository
{
    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setAuthorId(1)
                ->setAuthorName('Jane Dou')
                ->setAuthorPostIds([1, 2, 7])
                ->setUrl('jane-dou'),
            2 => $this->makeEntity()
                ->setAuthorId(2)
                ->setAuthorName('Jack Nobody')
                ->setAuthorPostIds([3, 6, 8])
                ->setUrl('jack-nobody'),
            3 => $this->makeEntity()
                ->setAuthorId(3)
                ->setAuthorName('Silvia Smith')
                ->setAuthorPostIds([4, 5])
                ->setUrl('silvia-smith'),
            4 => $this->makeEntity()
                ->setAuthorId(4)
                ->setAuthorName('Iurii Stepanenko')
                ->setAuthorPostIds([9])
                ->setUrl('iurii-stepanenko')
        ];
    }

    /**
     * @param int $authorId
     * @return Entity|null
     */
    public function getAuthorById(int $authorId): ?Entity
    {
        $authors = $this->getList();

        foreach ($authors as $author) {
            if ($author->getAuthorId() === $authorId) {
                return $author;
            }
        }

        return null;
    }

    /**
     * @param string $url
     * @return Entity|null
     */
    public function getAuthorByUrl(string $url): ?Entity
    {
        $authors = $this->getList();

        foreach ($authors as $author) {
            if ($author->getUrl() === $url) {
                return $author;
            }
        }

        return null;
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(\Iuriis\Blog\Model\Author\Entity::class);
    }
}