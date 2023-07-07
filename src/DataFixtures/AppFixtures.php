<?php

namespace App\DataFixtures;

use App\Entity\Comment;
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
        $users = [];

        /** User content */
        $emails = ['test1@test.com', 'test2@test.com', 'test3@test.com', 'test4@test.com', 'test5@test.com', 'test6@test.com', 'test7@test.com', 'test8@test.com', 'test9@test.com', ];
        $passwords = ['123456'];
        $names = ['test1', 'test2', 'test3', 'test4', 'test5', 'test6', 'test7', 'test8', 'test9'];
        $dateOfBirths = [new DateTime()];
        $townCityCounties = ['New York', 'Yorkshire', 'Paris', 'London', 'Glasgow', 'Berlin', 'Madrid', 'Passau', 'Cali'];
        $countries = ['USA', 'UK', 'FR', 'UK', 'SCT', 'GR', 'SPN', 'GR', 'USA'];

        for ($i = 0; $i < count($emails); $i++) {
            /** Add users */
            $users[] = $this->createUser($manager, [
                'email' => $emails[$i],
                'password' => $passwords[0],
                'name' => $names[$i],
                'dateOfBirth' => $dateOfBirths[0],
                'townCityCounty' => $townCityCounties[$i],
                'country' => $countries[$i]
            ]);

            /** Add random number of posts */
            $posts[] = $this->createRandomNumberOfEntities(10, function() use($manager, $i, $users) {
                return $this->createPost(
                    $manager,
                    'This is just some content for user' . ($i + 1),
                    $users[$i]
                );
            });
        }

        // convert posts from multidimensional array into one long array
        $allPosts = [];
        foreach ($posts as $post) {
            array_push($allPosts, ...$post);
        }

        for ($j = 0; $j < count($allPosts); $j++) {
            /** Add random number of Comments */
            $comments = $this->createRandomNumberOfEntities(2, function() use($manager, $allPosts, $j) {
                $this->createComment(
                    $manager,
                    'This is a comment on post ' . ($j + 1),
                    $allPosts[$j]->getUser(),
                    $allPosts[$j]
                );
            });

            /** Add random number of likes */
            $this->createRandomNumberOfLikes($allPosts[$j], $users);
        }

        $manager->flush();
    }

    private function createUser(ObjectManager $manager, array $spec): User
    {
        $user = new User();
        $user->setEmail($spec['email']);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                $spec['password']
            )
        );
        $userProfile = new UserProfile();
        $userProfile->setName($spec['name']);
        $userProfile->setAvatar('default.png');
        $userProfile->setDateOfBirth($spec['dateOfBirth']);
        $userProfile->setTownCityCounty($spec['townCityCounty']);
        $userProfile->setCountry($spec['country']);
        $user->setProfile($userProfile);
        $manager->persist($user);

        return $user;
    }

    private function createPost(ObjectManager $manager, string $content, User $user): Post
    {
        $post = new Post();
        $post->setContent($content);
        $post->setUser($user);
        $manager->persist($post);

        return $post;
    }

    private function createComment(ObjectManager $manager, string $content, User $user, Post $post): Comment
    {
        $comment = new Comment();
        $comment->setContent($content);
        $comment->setUser($user);
        $comment->setPost($post);
        $manager->persist($comment);

        return $comment;
    }

    private function createRandomNumberOfEntities(int $max, $callback): Array
    {
        $randomInt = random_int(0, $max);
        $entities = [];

        for ($i = 0; $i < $randomInt; $i++) {
            $entities[] = $callback();
        }

        return $entities;
    }

    private function createRandomNumberOfLikes(Post $post, array $users): void
    {
        $randomUserIndexes = [];
        $numberOfLikes = random_int(0, 3);

        // get random (but unique) users totalling the numberOfLikes
        for ($i = 0; $i < $numberOfLikes; $i++) {
            // same person can't like it twice
            $flag = false;
            while (!$flag) {
                $ranNo = random_int(0, count($users) - 1);
                if (!in_array($ranNo, $randomUserIndexes)) {
                    $randomUserIndexes[] = $ranNo;
                    $flag = true;
                }
            }
        }

        foreach ($randomUserIndexes as $i) {
            $post->addLike($users[$i]);
        }
    }
}
