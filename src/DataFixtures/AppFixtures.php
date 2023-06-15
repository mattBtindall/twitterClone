<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\UserProfile;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    )
    {}

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        /** @var User $user1 */

        $user1 = new User();
        $user1->setEmail('test@test.com');
        $user1->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user1,
                '123456'
            )
        );
        $user1Profile = new UserProfile();
        $user1Profile->setName('test');
        $user1Profile->setAvatar('default.png');
        $user1Profile->setDateOfBirth(new DateTime());
        $user1Profile->setTownCityCounty('Yorkshire');
        $user1Profile->setCountry('United Kingdom');
        $user1->setProfile($user1Profile);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('matt@test.com');
        $user2->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user2,
                '123456'
            )
        );
        $user2Profile = new UserProfile();
        $user2Profile->setName('test');
        $user2Profile->setAvatar('default.png');
        $user2Profile->setDateOfBirth(new DateTime());
        $user2->setProfile($user2Profile);
        $manager->persist($user2);

        $post1 = new Post();
        $post1->setContent('This is just some test content for post 1');
        $post1->setUser($user1);
        $manager->persist($post1);

        $post2 = new Post();
        $post2->setContent('This is just some test content for post 2');
        $post2->setUser($user1);
        $manager->persist($post2);

        $post3 = new Post();
        $post3->setContent('This is just some test content for post 3');
        $post3->setUser($user1);
        $manager->persist($post3);

        $post4 = new Post();
        $post4->setContent('This is just some test content for post 3');
        $post4->setUser($user2);
        $manager->persist($post4);

        $manager->flush();
    }
}
