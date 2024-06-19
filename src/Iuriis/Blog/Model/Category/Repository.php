<?php

declare(strict_types=1);

namespace Iuriis\Blog\Model\Category;

class Repository
{
    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('Ukraine')
                ->setUrl('ukraine')
                ->setPosts([1, 2, 3]),
            2 => $this->makeEntity()
                ->setCategoryId(2)
                ->setName('Denmark')
                ->setUrl('denmark')
                ->setPosts([4, 5, 6]),
            3 => $this->makeEntity()
                ->setCategoryId(3)
                ->setName('Poland')
                ->setUrl('poland')
                ->setPosts([7, 8, 9]),
        ];
    }

    /**
     * @param string $url
     * @return Entity
     */
    public function getByUrl(string $url): ?Entity
    {

        $data = array_filter(
            $this->getList(),
            static function ($category) use ($url) {
                return $category->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}