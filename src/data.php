<?php declare(strict_types=1);

/**
 * @return array[]
 */
function catalogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name' => 'Beaches',
            'url' => 'beaches',
            'posts' => [1, 2, 3]
        ],
        2 => [
            'category_id' => 2,
            'name' => 'Volcanoes',
            'url' => 'volcanoes',
            'posts' => [4, 5, 6]
        ],
        3 => [
            'category_id' => 3,
            'name' => 'Waterfalls',
            'url' => 'waterfalls',
            'posts' => [7, 8, 9]
        ]
    ];
}

/**
 * @return array[]
 */
function catalogGetPost(): array
{
    return [
        1 => [
            'post_id' => 1,
            'name' => 'Post1',
            'url' => 'product-1',
            'description' => 'Post1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jane Dou',
            'publication_date' => '2022-06-15'
        ],
        2 => [
            'post_id' => 2,
            'name' => 'Post2',
            'url' => 'product-2',
            'description' => 'Post2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jane Dou',
            'publication_date' => '2022-08-11'
            ],
        3 => [
            'post_id' => 3,
            'name' => 'Post3',
            'url' => 'product-3',
            'description' => 'Post3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jack Nobody',
            'publication_date' => '2022-08-28'
        ],
        4 => [
            'post_id' => 4,
            'name' => 'Post4',
            'url' => 'product-4',
            'description' => 'Post4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Silvia Smith',
            'publication_date' => '2022-11-07'
        ],
        5 => [
            'post_id' => 5,
            'name' => 'Post5',
            'url' => 'product-5',
            'description' => 'Post5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Silvia Smith',
            'publication_date' => '2022-12-30'
        ],
        6 => [
            'post_id' => 6,
            'name' => 'Post6',
            'url' => 'product-6',
            'description' => 'Post6 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jack Nobody',
            'publication_date' => '2023-01-16'
        ]
        ,
        7 => [
            'post_id' => 7,
            'name' => 'Post7',
            'url' => 'product-7',
            'description' => 'Post7 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jane Dou',
            'publication_date' => '2023-02-15'
        ]
        ,
        8 => [
            'post_id' => 8,
            'name' => 'Post8',
            'url' => 'product-8',
            'description' => 'Post8 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jack Nobody',
            'publication_date' => '2023-02-28'
        ]
        ,
        9 => [
            'post_id' => 9,
            'name' => 'Post9',
            'url' => 'product-9',
            'description' => 'Post9 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Iurii Stepanenko',
            'publication_date' => '2023-03-10'
        ]
    ];
}

/**
 * @param int $categoryId
 * @return array
 */
function catalogGetCategoryPost(int $categoryId): array
{
    $categories = catalogGetCategory();

    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId does not exist");
    }

    $postsForCategory = [];
    $posts = catalogGetPost();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("Product with ID $postId from category $categoryId does not exist");
        }

        $postsForCategory[] = $posts[$postId];
    }

    return $postsForCategory;
}

/**
 * @param string $url
 * @return array|null
 */
function catalogGetCategoryByUrl(string $url): ?array
{
    $data = array_filter(
        catalogGetCategory(),
        static function ($category) use ($url) {
            return $category['url'] === $url;
        }
    );

    return array_pop($data);
}

/**
 * @param string $url
 * @return array|null
 */
function catalogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        catalogGetPost(),
        static function ($post) use ($url) {
            return $post['url'] === $url;
        }
    );

    return array_pop($data);
}

/**
 * @return array|null
 */
function blogGetNewPosts(): ?array
{
    $posts = catalogGetPost();
    // Sort posts by publication_date in descending order
    usort($posts, static function ($a, $b) {
        return strtotime($b['publication_date']) - strtotime($a['publication_date']);
    });

    // Return the first three elements of the sorted array
    return array_slice($posts, 0, 3);
}

//function blogGetNewPosts(): ?array
//{
//    return array_slice(catalogGetPost(), -3, 3, true);
//}