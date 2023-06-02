<?php
const POSTS = [
    [
        'id' => 0,
        'user' => [
            'id' => 0,
            'name' => 'Don Norman',
            'email' => 'donnorman@gmail.com',
        ],
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore deserunt nihil rem, dolores commodi, fugit unde distinctio minima inventore id temporibus repellendus magni culpa debitis natus laboriosam reprehenderit. Veniam, facere?',
        'created' => new DateTime(),
        'likedBy' => [
            ['name' => 'Paul Dingle', 'email' => 'pauldingleberries@gmail.com']
        ],
        'comments' => [
            [
                'content' => 'This is just a random comment',
                'user' => ['name' => 'Paul Dingle','email' => 'pauldingleberries@gmail.com']
            ],
            [
                'content' => 'This is just another random comment',
                'user' => ['name' => 'Matt Tindall','email' => 'mattbtindall@gmail.com']
            ],
        ]
    ],
    [
        'id' => 1,
        'user' => [
            'id' => 1,
            'name' => 'Paul Dingle',
            'email' => 'pauldingleberries@gmail.com',
        ],
        'content' => 'this is just a small post',
        'created' => new DateTime(),
        'likedBy' => [],
        'comments' => [
            [
                'content' => 'This is just a random comment',
                'user' => ['name' => 'Paul Dingle','email' => 'pauldingleberries@gmail.com']
            ]
        ]
    ],
    [
        'id' => 2,
        'user' => [
            'id' => 2,
            'name' => 'Matt Tindall',
            'email' => 'mattbtindall@gmail.com',
        ],
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore deserunt nihil rem, dolores commodi, fugit unde distinctio minima inventore id temporibus repellendus magni culpa debitis natus laboriosam reprehenderit. Veniam, facere?',
        'created' => new DateTime(),
        'likedBy' => [],
        'comments' => []
    ],
    [
        'id' => 0,
        'user' => [
            'id' => 0,
            'name' => 'Don Norman',
            'email' => 'donnorman@gmail.com',
        ],
        'content' => 'Some test post, lorem boop blap bleep',
        'created' => new DateTime(),
        'likedBy' => [
            ['name' => 'Paul Dingle', 'email' => 'pauldingleberries@gmail.com']
        ],
        'comments' => [
            [
                'content' => 'This is just a random comment',
                'user' => ['name' => 'Paul Dingle','email' => 'pauldingleberries@gmail.com']
            ],
            [
                'content' => 'This is just another random comment',
                'user' => ['name' => 'Matt Tindall','email' => 'mattbtindall@gmail.com']
            ],
        ]
    ],
];

const USERS = [
    [
        'id' => 0,
        'name' => 'Don Norman',
        'email' => 'donnorman@gmail.com',
        'following' => ['test1', 'test2', 'test3'],
        'followers' => ['test1', 'test2', 'test3', 'test4', 'test5'],
        'avatar' => 'default.png',
        'posts' => [POSTS[0]],
        'likes' => [],
        'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos asperiores a consectetur repudiandae vero quidem qui aperiam iusto.',
        'location' => [
            'townCity' => 'London',
            'country' => 'United Kingdom'
        ],
        'createdAt' => new DateTime(),
        'websiteUrl' => 'www.google.com'
    ],
    [
        'id' => 1,
        'name' => 'Paul Dingle',
        'email' => 'pauldingleberries@gmail.com',
        'following' => ['test1'],
        'followers' => ['test1', 'test2'],
        'avatar' => 'default.png',
        'posts' => [POSTS[1]],
        'likes' => [POSTS[0]],
        'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero debitis placeat quisquam impedit exercitationem eligendi ipsum ipsam molestiae quos molestias.',
        'location' => [
            'townCity' => 'Huddersfield',
            'country' => 'United Kingdom'
        ],
        'createdAt' => new DateTime(),
        'websiteUrl' => 'getbootstrap.com.com'
    ],
    [
        'id' => 2,
        'name' => 'Matt Tindall',
        'email' => 'mattbtindall@gmail.com',
        'following' => ['test1'],
        'followers' => ['test1', 'test2'],
        'avatar' => 'default.png',
        'posts' => [POSTS[2]],
        'likes' => [],
        'bio' => 'Lorem ipsum dolor sit, amet consectetur adipisicing.',
        'location' => [
            'townCity' => 'Florida',
            'country' => 'USA'
        ],
        'createdAt' => new DateTime(),
        'websiteUrl' => 'facebook.com'
    ]
];

const USER = USERS[1];
