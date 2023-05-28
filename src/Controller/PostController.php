<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Used for test data
require_once '../public/Constants/Constants.php';

class PostController extends AbstractController
{
    #[Route('/posts', name: 'app')]
    public function index(): Response
    {
        return $this->render('post/posts.html.twig', [
            'pageTitle' => 'Home',
            'user' => USER,
            'posts' => POSTS
        ]);
    }
}
