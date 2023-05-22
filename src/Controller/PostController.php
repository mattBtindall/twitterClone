<?php

namespace App\Controller;

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

        return $this->render('post/posts.html.twig', [
            'pageTitle' => 'Home',
            'user' => $user
        ]);
    }
}
