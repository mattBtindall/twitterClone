<?php
const USER = [
    'name' => 'geoff',
    'email' => 'geoff@gmail.com',
    'following' => ['test1', 'test2', 'test3'],
    'followers' => ['test1', 'test2', 'test3', 'test4', 'test5'],
    'avatar' => 'default.png'
];

const POSTS = [
    [
        'id' => 1,
        'user' => [
            'name' => 'Don Norman',
            'email' => 'donnorman@gmail.com',
        ],
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore deserunt nihil rem, dolores commodi, fugit unde distinctio minima inventore id temporibus repellendus magni culpa debitis natus laboriosam reprehenderit. Veniam, facere?',
        'created' => new DateTime()
    ],
    [
        'id' => 2,
        'user' => [
            'name' => 'Paul Dingle',
            'email' => 'pauldingleberries@gmail.com',
        ],
        'content' => 'this is just a small post',
        'created' => new DateTime()
    ],
    [
        'id' => 3,
        'user' => [
            'name' => 'Matt Tindall',
            'email' => 'mattbtindall@gmail.com',
        ],
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore deserunt nihil rem, dolores commodi, fugit unde distinctio minima inventore id temporibus repellendus magni culpa debitis natus laboriosam reprehenderit. Veniam, facere?',
        'created' => new DateTime()
    ],
];
