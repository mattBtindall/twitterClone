<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/posts', name: 'app')]
    public function index(): Response
    {
        $user = [
            'name' => 'geoff',
            'email' => 'geoff@gmail.com',
            'following' => ['test1', 'test2', 'test3'],
            'followers' => ['test1', 'test2', 'test3', 'test4', 'test5'],
            'avatar' => 'default.png'
        ];

        $posts = [
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
                    'name' => 'Matt Tindall',
                    'email' => 'mattbtindall@gmail.com',
                ],
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore deserunt nihil rem, dolores commodi, fugit unde distinctio minima inventore id temporibus repellendus magni culpa debitis natus laboriosam reprehenderit. Veniam, facere?',
                'created' => new DateTime()
            ],
        ];

        return $this->render('post/posts.html.twig', [
            'pageTitle' => 'Home',
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
