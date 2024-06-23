<?php

declare(strict_types=1);

namespace Iuriis\Blog\Model\Post;

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
                ->setPostId(1)
                ->setName('Post1')
                ->setUrl('post-1')
                ->setDescription('Post1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Jane Dou')
                ->setPublicationDate('2022-06-15'),
            2 => $this->makeEntity()
                ->setPostId(2)
                ->setName('Post2')
                ->setUrl('post-2')
                ->setDescription('Post2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Jane Dou')
                ->setPublicationDate('2022-08-11'),
            3 => $this->makeEntity()
                ->setPostId(3)
                ->setName('Post3')
                ->setUrl('post-3')
                ->setDescription('Post3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Jack Nobody')
                ->setPublicationDate('2022-08-28'),
            4 => $this->makeEntity()
                ->setPostId(4)
                ->setName('Post4')
                ->setUrl('post-4')
                ->setDescription('Post4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Silvia Smith')
                ->setPublicationDate('2022-11-07'),
            5 => $this->makeEntity()
                ->setPostId(5)
                ->setName('Post5')
                ->setUrl('post-5')
                ->setDescription('Post5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Silvia Smith')
                ->setPublicationDate('2022-12-30'),
            6 => $this->makeEntity()
                ->setPostId(6)
                ->setName('Post6')
                ->setUrl('post-6')
                ->setDescription('Post6 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Jack Nobody')
                ->setPublicationDate('2023-01-16'),
            7 => $this->makeEntity()
                ->setPostId(7)
                ->setName('Post7')
                ->setUrl('post-7')
                ->setDescription('Post7 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Jane Dou')
                ->setPublicationDate('2023-02-15'),
            8 => $this->makeEntity()
                ->setPostId(8)
                ->setName('Post8')
                ->setUrl('post-8')
                ->setDescription('Post8 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Jack Nobody')
                ->setPublicationDate('2023-02-28'),
            9 => $this->makeEntity()
                ->setPostId(9)
                ->setName('Post9')
                ->setUrl('post-9')
                ->setDescription('Post9 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.')
                ->setAuthorName('Iurii Stepanenko')
                ->setPublicationDate('2023-03-10')
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
            static function ($post) use ($url) {
                return $post->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param array $productIds
     * @return Entity[]
     */
    public function getByIds(array $productIds)
    {
        return array_intersect_key(
            $this->getList(),
            array_flip($productIds)
        );
    }

    /**
     * @return array|null
     */
    public function blogGetNewPosts(): ?array
    {
        $posts = $this->getList();
        // Sort posts by publication_date in descending order
        usort($posts, static function ($a, $b) {
            return strtotime($b->getPublicationDate()) - strtotime($a->getPublicationDate());
        });

        // Return the first three elements of the sorted array
        return array_slice($posts, 0, 3);
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}