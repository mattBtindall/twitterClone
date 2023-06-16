<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/posts/{openPostInput?}', name: 'app_posts', defaults: ['openPostInput' => false])]
    public function index($openPostInput, PostRepository $posts): Response
    {
        return $this->render('post/posts.html.twig', [
            'pageTitle' => 'Home',
            'posts' => $posts->findAll(),
            'openPostInput' => $openPostInput
        ]);
    }

    #[Route('/post/{id}', name: 'app_post_show')]
    public function show(Post $post): Response
    {
        return $this->render('post/post.html.twig', [
            'pageTitle' => 'Post',
            'post' => $post
        ]);
    }

    #[Route('/post/{id}/edit', name: 'app_post_edit')]
    public function edit(Post $post): Response
    {
        return $this->render('post/edit.html.twig', [
            'pageTitle' => 'Edit',
            'post' => $post,
            'editPost' => true
        ]);
    }

    #[Route('/post/{id}/comment', name: 'app_post_comment')]
    public function comment(Post $post): Response
    {
        return $this->render('post/comment.html.twig', [
            'pageTitle' => 'Comment',
            'post' => $post,
            'comment' => true
        ]);
    }
}
