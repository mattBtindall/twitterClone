<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Used for test data
require_once '../public/Constants/Constants.php';

class PostController extends AbstractController
{
    #[Route('/posts', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('post/posts.html.twig', [
            'pageTitle' => 'Home',
            'user' => USER,
            'posts' => POSTS
        ]);
    }

    #[Route('/post/{id}', name: 'app_show')]
    public function show($id): Response
    {
        $post = array_values(array_filter(POSTS, function($value) use($id) {
            if ($value['id'] == $id) {
                return true;
            }
        }))[0];

        return $this->render('post/post.html.twig', [
            'pageTitle' => 'Show',
            'user' => USER,
            'post' => $post
        ]);
    }
}
