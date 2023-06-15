<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Used for test data
// require_once '../public/Constants/Constants.php';

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'app_profile_posts')]
    public function index(User $user): Response
    {
        return $this->render('profile/profile.html.twig', [
            'pageTitle' => $user->getProfile()->getName(),
            'user' => $user,
            'activeTab' => 'posts'
        ]);
    }

    #[Route('/profile/{id}/likes', name: 'app_profile_likes')]
    public function likes(User $user): Response
    {
        return $this->render('profile/likes.html.twig', [
            'pageTitle' => $user->getProfile()->getName(),
            'user' => $user,
            'activeTab' => 'likes'
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
        return $this->render('profile/following.html.twig', [
            'pageTitle' => $user->getProfile()->getName(),
            'user' => $user,
            'activeTab' => 'following'
        ]);
    }
}
