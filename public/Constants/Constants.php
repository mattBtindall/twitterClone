<?php
const POSTS = [
    [
        'id' => 0,
        'user' => [
            'id' => 0,
            'name' => 'Don Norman',
            'email' => 'donnorman@gmail.com',
            'avatar' => 'default.png'
        ],
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore deserunt nihil rem, dolores commodi, fugit unde distinctio minima inventore id temporibus repellendus magni culpa debitis natus laboriosam reprehenderit. Veniam, facere?',
        'created' => new DateTime(),
        'likedBy' => [
            ['name' => 'Paul Dingle', 'email' => 'pauldingleberries@gmail.com']
        ],
        'comments' => [
            [
                'content' => 'This is just a random comment',
                'user' => ['name' => 'Paul Dingle','email' => 'pauldingleberries@gmail.com', 'avatar' => 'default.png', 'id' => 1],
                'created' => new DateTime()
            ],
            [
                'content' => 'This is just another random arse comment',
                'user' => ['name' => 'Matt Tindall','email' => 'mattbtindall@gmail.com', 'avatar' => 'default.png', 'id' => 2],
                'created' => new DateTime()
            ],
        ]
    ],
    [
        'id' => 1,
        'user' => [
            'id' => 1,
            'name' => 'Paul Dingle',
            'email' => 'pauldingleberries@gmail.com',
            'avatar' => 'default.png'
        ],
        'content' => 'this is just a small post',
        'created' => new DateTime(),
        'likedBy' => [],
        'comments' => []
    ],
    [
        'id' => 2,
        'user' => [
            'id' => 2,
            'name' => 'Matt Tindall',
            'email' => 'mattbtindall@gmail.com',
            'avatar' => 'default.png'
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
            'avatar' => 'default.png'
        ],
        'content' => 'Some test post, lorem boop blap bleep',
        'created' => new DateTime(),
        'likedBy' => [
            ['name' => 'Paul Dingle', 'email' => 'pauldingleberries@gmail.com']
        ],
        'comments' => []
    ],
];

const USERS = [
    [
        'id' => 0,
        'name' => 'Don Norman',
        'email' => 'donnorman@gmail.com',
        'following' => [
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
                'websiteUrl' => 'getbootstrap.com'
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
        ],
        'followers' => [
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
                'websiteUrl' => 'getbootstrap.com'
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
                'websiteUrl' => 'getbootstrap.com'
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
                'websiteUrl' => 'getbootstrap.com'
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
                'websiteUrl' => 'getbootstrap.com'
            ],
        ],
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
        'following' => [],
        'followers' => [],
        'avatar' => 'default.png',
        'posts' => [POSTS[1]],
        'likes' => [POSTS[0]],
        'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero debitis placeat quisquam impedit exercitationem eligendi ipsum ipsam molestiae quos molestias.',
        'location' => [
            'townCity' => 'Huddersfield',
            'country' => 'United Kingdom'
        ],
        'createdAt' => new DateTime(),
        'websiteUrl' => 'getbootstrap.com'
    ],
    [
        'id' => 2,
        'name' => 'Matt Tindall',
        'email' => 'mattbtindall@gmail.com',
        'following' => [],
        'followers' => [],
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

const USER = USERS[0];
