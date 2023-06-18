<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\MainInputType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class PostController extends AbstractController
{
    #[Route('/posts/{openPostInput?}', name: 'app_posts', defaults: ['openPostInput' => false])]
    public function index($openPostInput, PostRepository $posts, Request $request): Response
    {
        $form = $this->createForm(MainInputType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = new Post();
            $post->setUser($this->getUser());
            $post->setContent($form->getData('post')['post']);
            $posts->save($post, true);

            $this->addFlash('success', 'Your post has been added');
            return $this->redirectToRoute('app_posts');
        }

        return $this->render('post/posts.html.twig', [
            'pageTitle' => 'Home',
            'posts' => $posts->findAll(),
            'openPostInput' => $openPostInput,
            'mainInputForm' => $form
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
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function comment(Post $post): Response
    {
        return $this->render('post/comment.html.twig', [
            'pageTitle' => 'Comment',
            'post' => $post,
            'comment' => true
        ]);
    }
}
