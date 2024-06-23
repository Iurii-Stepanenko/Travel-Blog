<?php declare(strict_types=1);


/**
 * @return array[]
 */
function catalogGetPost(): array
{
    return [
        1 => [
            'post_id' => 1,
            'name' => 'Post1',
            'url' => 'post-1',
            'description' => 'Post1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jane Dou',
            'publication_date' => '2022-06-15'
        ],
        2 => [
            'post_id' => 2,
            'name' => 'Post2',
            'url' => 'post-2',
            'description' => 'Post2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jane Dou',
            'publication_date' => '2022-08-11'
            ],
        3 => [
            'post_id' => 3,
            'name' => 'Post3',
            'url' => 'post-3',
            'description' => 'Post3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jack Nobody',
            'publication_date' => '2022-08-28'
        ],
        4 => [
            'post_id' => 4,
            'name' => 'Post4',
            'url' => 'post-4',
            'description' => 'Post4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Silvia Smith',
            'publication_date' => '2022-11-07'
        ],
        5 => [
            'post_id' => 5,
            'name' => 'Post5',
            'url' => 'post-5',
            'description' => 'Post5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Silvia Smith',
            'publication_date' => '2022-12-30'
        ],
        6 => [
            'post_id' => 6,
            'name' => 'Post6',
            'url' => 'post-6',
            'description' => 'Post6 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jack Nobody',
            'publication_date' => '2023-01-16'
        ]
        ,
        7 => [
            'post_id' => 7,
            'name' => 'Post7',
            'url' => 'post-7',
            'description' => 'Post7 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jane Dou',
            'publication_date' => '2023-02-15'
        ]
        ,
        8 => [
            'post_id' => 8,
            'name' => 'Post8',
            'url' => 'post-8',
            'description' => 'Post8 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Jack Nobody',
            'publication_date' => '2023-02-28'
        ]
        ,
        9 => [
            'post_id' => 9,
            'name' => 'Post9',
            'url' => 'post-9',
            'description' => 'Post9 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.',
            'author_name' => 'Iurii Stepanenko',
            'publication_date' => '2023-03-10'
        ]
    ];
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