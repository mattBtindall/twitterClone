<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Used for test data
require_once '../public/Constants/Constants.php';

class ProfileController extends AbstractController
{
    #[Route('/profile/{id?}', name: 'app_profile', defaults: ['id' => null])]
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
            'user' => $user
        ]);
    }
}
