<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Entity\User;
use App\Form\UserProfileType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
class SettingsProfileController extends AbstractController
{
    #[Route('/settings/profile', name: 'app_settings_profile')]
    public function profile(
        Request $request,
        UserRepository $users
    ): Response
    {
        /** @var User $user  */
        $user = $this->getUser();
        $userProfile = $user->getProfile() ?? new UserProfile();

        $form = $this->createForm(
            UserProfileType::class,
            $userProfile
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userProfile = $form->getData();
            $user->setProfile($userProfile);
            $users->save($user, true);
            $this->addFlash(
                'success',
                'Your user Profile was saved'
            );
            return $this->redirectToRoute('app_settings_profile');
        }

        return $this->render('settings_profile/settings-profile.html.twig', [
            'pageTitle' => 'Profile Settings (details)',
            'form' => $form->createView(),
            'activeTab' => 'details'
        ]);
    }

    #[Route('/settings/profile-image', name: 'app_settings_profile_image')]
    public function profileImage(): Response
    {
        return $this->render('settings_profile/profile-image.html.twig', [
            'pageTitle' => 'Profile Settings (avatar upload)',
            // 'form' => $form->createView()
            'activeTab' => 'imageUpload'
        ]);
    }
}
