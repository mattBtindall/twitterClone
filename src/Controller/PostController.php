<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Used for test data
require_once '../public/Constants/Constants.php';

class PostController extends AbstractController
{
    #[Route('/posts/{openPostInput?}', name: 'app_posts', defaults: ['openPostInput' => false])]
    public function index($openPostInput): Response
    {
        return $this->render('post/posts.html.twig', [
            'pageTitle' => 'Home',
            'user' => USER,
            'posts' => POSTS,
            'openPostInput' => $openPostInput
        ]);
    }

    #[Route('/post/{id}', name: 'app_post_show')]
    public function show($id): Response
    {
        $post = array_values(array_filter(POSTS, function($value) use($id) {
            if ($value['id'] == $id) {
                return true;
            }
        }))[0];

        return $this->render('post/post.html.twig', [
            'pageTitle' => 'Post',
            'user' => USER,
            'post' => $post
        ]);
    }

    #[Route('/post/{id}/edit', name: 'app_post_edit')]
    public function edit($id): Response
    {
        $post = array_values(array_filter(POSTS, function($value) use($id) {
            if ($value['id'] == $id) {
                return true;
            }
        }))[0];

        return $this->render('post/edit.html.twig', [
            'pageTitle' => 'Edit',
            'user' => USER,
            'post' => $post,
            'editPost' => true
        ]);
    }

    #[Route('/post/{id}/comment', name: 'app_post_comment')]
    public function comment($id): Response
    {
        $post = array_values(array_filter(POSTS, function($value) use($id) {
            if ($value['id'] == $id) {
                return true;
            }
        }))[0];

        return $this->render('post/comment.html.twig', [
            'pageTitle' => 'Comment',
            'user' => USER,
            'post' => $post,
            'comment' => true
        ]);
    }
}
