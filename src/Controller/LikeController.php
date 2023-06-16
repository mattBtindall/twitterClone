<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
class LikeController extends AbstractController
{
    #[Route('/like/{id}', name: 'app_like')]
    public function like(
        Post $post,
        Request $request,
        PostRepository $posts
    ): Response
    {
        $user = $this->getUser();
        $post->addLike($user);
        $posts->save($post, true);

        return $this->redirect($request->headers->get('referer'));
    }

    #[Route('/unlike/{id}', name: 'app_unlike')]
    public function unlike(
        Post $post,
        Request $request,
        PostRepository $posts
    ): Response
    {
        $user = $this->getUser();
        $post->removeLike($user);
        $posts->save($post, true);

        return $this->redirect($request->headers->get('referer'));
    }
}
