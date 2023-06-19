<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Entity\User;
use App\Form\ProfileImageType;
use App\Form\UserProfileType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

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
    public function profileImage(
        Request $request,
        SluggerInterface $slugger,
        UserRepository $users
    ): Response
    {
        $form = $this->createForm(ProfileImageType::class);
        $templateParams = [
            'pageTitle' => 'Profile Settings (avatar upload)',
            'form' => $form->createView(),
            'activeTab' => 'imageUpload'
        ];
        /** @var User $user */
        $user = $this->getUser();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profileImageFile = $form->get('profileImage')->getData();

            if ($profileImageFile) {
                $originalFileName = pathinfo(
                    $profileImageFile->getClientOriginalName(),
                    PATHINFO_FILENAME
                );

                $safeFileName = $slugger->slug($originalFileName);
                $newFileName = $safeFileName . '-' . uniqid() . '.' . $profileImageFile->guessExtension();

                try {
                    $profileImageFile->move(
                        $this->getParameter('profiles_directory'),
                        $newFileName
                    );
                } catch (FileException $e) {

                }

                $profile = $user->getProfile();
                $profile->setAvatar($newFileName);
                $users->save($user, true);
                $this->addFlash('success', 'Your profile image was uploaded');
                $this->redirectToRoute('app_settings_profile_image');
            }
        }

        return $this->render('settings_profile/profile-image.html.twig', $templateParams);

    }
}
