<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'app_profile_posts')]
    public function index(
        $id,
        PostRepository $posts,
        UserRepository $users
    ): Response
    {
        $user = $users->findUserWithAll($id);

        return $this->render('profile/profile.html.twig', [
            'pageTitle' => $user->getProfile()->getName(),
            'user' => $user,
            'activeTab' => 'posts',
            'posts' => $posts->findAllByUser($user)
        ]);
    }

    #[Route('/profile/{id}/likes', name: 'app_profile_likes')]
    public function likes(
        User $user,
        UserRepository $users
    ): Response
    {
        return $this->render('profile/likes.html.twig', [
            'pageTitle' => $user->getProfile()->getName(),
            'user' => $user,
            'activeTab' => 'likes',
            'posts' => $users->findLikedPostsByUser($user)
        ]);
    }

    #[Route('/profile/{id}/following', name: 'app_profile_following')]
    public function following(User $user): Response
    {
        return $this->render('profile/following.html.twig', [
            'pageTitle' => $user->getProfile()->getName(),
            'user' => $user,
            'activeTab' => 'following'
        ]);
    }

    #[Route('/profile/{id}/followers', name: 'app_profile_followers')]
    public function followers(User $user): Response
    {
        return $this->render('profile/followers.html.twig', [
            'pageTitle' => $user->getProfile()->getName(),
            'user' => $user,
            'activeTab' => 'followers'
        ]);
    }
}
