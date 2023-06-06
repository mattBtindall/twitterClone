<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Used for test data
require_once '../public/Constants/Constants.php';

class ProfileController extends AbstractController
{
    #[Route('/profile/{id?}', name: 'app_profile_posts', defaults: ['id' => null])]
    public function index($id): Response
    {
        if ($id === null) {
            $user = USER;
        } else {
            $filteredUser = array_values(array_filter(USERS, function($user) use($id) {
                if ($user['id'] == $id) {
                    return true;
                }
            }));
            $user = $filteredUser[0];
        }

        return $this->render('profile/profile.html.twig', [
            'pageTitle' => $user['name'],
            'user' => $user,
            'activeTab' => 'posts'
        ]);
    }

    #[Route('/profile/{id?}/likes', name: 'app_profile_likes', defaults: ['id' => null])]
    public function likes($id): Response
    {
        if ($id === null) {
            $user = USER;
        } else {
            $filteredUser = array_values(array_filter(USERS, function($user) use($id) {
                if ($user['id'] == $id) {
                    return true;
                }
            }));
            $user = $filteredUser[0];
        }

        return $this->render('profile/likes.html.twig', [
            'pageTitle' => $user['name'],
            'user' => $user,
            'activeTab' => 'likes'
        ]);
    }

    #[Route('/profile/{id?}/following', name: 'app_profile_following', defaults: ['id' => null])]
    public function following($id): Response
    {
        if ($id === null) {
            $user = USER;
        } else {
            $filteredUser = array_values(array_filter(USERS, function($user) use($id) {
                if ($user['id'] == $id) {
                    return true;
                }
            }));
            $user = $filteredUser[0];
        }

        return $this->render('profile/following.html.twig', [
            'pageTitle' => $user['name'],
            'user' => $user,
            'activeTab' => 'following'
        ]);
    }

    #[Route('/profile/{id?}/followers', name: 'app_profile_followers', defaults: ['id' => null])]
    public function followers($id): Response
    {
        if ($id === null) {
            $user = USER;
        } else {
            $filteredUser = array_values(array_filter(USERS, function($user) use($id) {
                if ($user['id'] == $id) {
                    return true;
                }
            }));
            $user = $filteredUser[0];
        }

        return $this->render('profile/followers.html.twig', [
            'pageTitle' => $user['name'],
            'user' => $user,
            'activeTab' => 'followers'
        ]);
    }

}
